<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ApplicationDocument;
use App\Models\ApplicationEducation;
use App\Models\ApplicationWork;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Course;
use App\Models\StudentApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use File;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class StudentApplicationController extends Controller
{
    function applications()
    {
        $applications = StudentApplication::where('user_id', auth()->user()->id)->has('carts')->get();
        return view('Frontend.university.applications');
    }
    function generateRandomString($length = 10)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }
    function applyCart(Request $request, $id, $partner_ref_id = null, $is_applied_partner = null)
    {
        if (!Auth::check() && !$request->query('partner_ref_id')) {
            return redirect()->route('frontend.signin')->with('error', 'Please sign in or provide a partner reference ID.');
        }

        if (session('partner_ref_id') || $request->query('partner_ref_id')) {
            $partner_ref_id = session('partner_ref_id') ?? $request->query('partner_ref_id');
        }

        if (session('is_applied_partner') || $request->query('is_applied_partner') || ($request->query('is_anonymous') == 'true')) {
            $is_anonymous = $request->query('is_anonymous') == 'true' ? 1 : 0;
            $is_applied_partner = session('is_applied_partner') ?? $request->query('is_applied_partner') ?? $is_anonymous;
        }

        $course = Course::find($id);
        $application = null;

        if (Auth::check()) {
            $application = StudentApplication::where('status', 0)->where('user_id', auth()->user()->id)->where('partner_ref_id', $partner_ref_id)->has('carts')->first();
        }

        if ($application == null) {
            $application = new StudentApplication;
            $application->user_id = auth()->user()->id ?? null;
            $application->application_code = 'RM-EDU-' . strtoupper($this->generateRandomString(6));
            $application->application_fee = (float) $course->consultancy_fee;
            $application->total_fee = (float) $course->consultancy_fee;
            $application->partner_ref_id = base64_decode($partner_ref_id);
            $application->is_applied_partner = $is_applied_partner;

            $application->save();
        } else {
            $application->application_fee =  $application->application_fee + (float) $course->consultancy_fee;
            $application->total_fee = $application->total_fee + (float) $course->consultancy_fee;

            $application->save();
        }

        $cart = Cart::where('application_id', $application->id)->where('course_id', $course->id)->first();

        if ($cart) {
            $application->application_fee =  $application->application_fee - $course->consultancy_fee;
            $application->total_fee = $application->total_fee - $course->consultancy_fee;
            $application->save();
            return back()->with('error', 'Sorry, This program already added');
        }

        $cart = new Cart;
        $cart->application_id = $application->id;
        $cart->course_id = $course->id;
        $cart->amount = empty($course->consultancy_fee) ? 0 : $course->consultancy_fee;
        $cart->save();

        $params = ['id' => $application->id];

        if (session('partner_ref_id') && !empty(session('partner_ref_id'))) {
            $params['partner_ref_id'] = session('partner_ref_id');
        }

        if (session('is_applied_partner')) {
            $params['is_applied_partner'] = true;
        }

        return redirect()->route('apply_admission', $params);
    }

    function applyAdmission($id, $partner_ref_id = null)
    {
        $data['id'] = $id;
        $data['countries'] = Country::orderBy('name', 'asc')->get();
        // dd($data['countries']);
        $data['application'] = StudentApplication::find($id);

        if ($data['application'] == null) {
            return redirect('list/all-universities');
        }

        return view('Frontend.university.apply', $data);
    }
    
    function applyCartDelete(Request $request, $id)
    {
        //return $request;
        $application = StudentApplication::find($id);
        $cart = Cart::find($request->prog_id);
        //return $request->prog_id;
        if ($cart) {
            $application->application_fee =  $application->application_fee - $cart->amount;
            $application->total_fee = $application->total_fee - $cart->amount;
            $application->save();
            $cart->delete();
            $data['code'] = 0;
            $data['msg'] = "program delete Sucessfully!";
            return response()->json($data);
        } else {
            $data['code'] = 0;
            $data['msg'] = "program can not delete";
            return response()->json($data);
        }
    }
    function applicationDetails($id)
    {
        $application = StudentApplication::find($id);

        if ($application) {
            $data['programs'] = [];

            foreach ($application->carts as $cart) {
                $program = [];
                $program['id'] = $cart->id;
                $program['logo'] = $cart->course->university->image_show;
                $program['url'] = url('courses/details/' . $cart->course?->id);
                $program['user_program_name'] = $cart->course?->name;
                $program['deadline'] = date('M d, Y', strtotime($cart->course->application_deadline));
                $to = \Carbon\Carbon::now();
                $from = \Carbon\Carbon::parse($cart->course->application_deadline);
                $program['days_to_deadline'] = $days = $to->diffInDays($from);
                $program['start_date'] = date('M d, Y', strtotime($cart->course->next_start_date));
                $data['programs'][] = $program;
            }
            $data['code'] = 0;
            $data['msg'] = "program is not found";
            $data['status'] = "Application Started";
            $data['waits_for'] = "no";

            $data['application_fee'] = $application->application_fee;
            $data['total_fee'] = $application->total_fee;

            return response()->json($data);
        } else {
            $data['code'] = -1;
            $data['msg'] = "program is not found";
            return response()->json($data);
        }
    }
    
    function applicationPersonalInfo(Request $request, $id)
    {

        // dd($request->all());
        // Log::info('Request Data:', $request->all());
        
        $application = StudentApplication::find($id);
        if ($application) {
            $application->email = $request->email;
            $application->phone = $request->phone;
            $application->first_name = $request->first_name;
            // $application->middle_name = $request->middle_name;
            // $application->last_name = $request->last_name;
            $application->last_name = $request->last_name;
            // $application->chinese_name = $request->chinese_name ?? '';
            $application->dob = $request->date_of_birth;
            $application->gender = $request->gender;
            // $application->hobby = $request->hobbies_interests;
            // $application->in_chaina = $request->is_in_china ?? '';
            $application->in_alcoholic = $request->addict_to_alcohol_drugs == false ? 0 : 1;
            $application->native_language = $request->language_native;
            $application->english_level = $request->english_level;
            $application->language_proficiency_english = $request->language_proficiency_english;
            // $application->chinese_level = $request->language_proficiency_chinese ?? '';
            $application->maritial_status = $request->marital_status;
            $application->nationality = $request->applicants_nationality;
            $application->passport_exipre_date = $request->passport_expiration_date;
            $application->passport_number = $request->passport_no;
            $application->birth_place = $request->place_of_birth;
            $application->religion = $request->religion;
            $application->highest_education_level = $request->highest_education_level;

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('upload/photos'), $filename);
                $application->profile_photo = $filename; 
            }
            else{
                log::info('df');
            }
            $application->save();
        }
        // dd($application);
        // log::info($application);

        $data['code'] = 0;
        $data['msg'] = "Personal information Update Successfully";
        return response()->json($data);
    }
    function applicationHomeAddress(Request $request, $id)
    {
        // return $request;
        // Log::info('Request Data:', $request->all());
        $application = StudentApplication::find($id);
        if ($application) {
            $application->home_country = $request->country;
            $application->home_city = $request->city;
            $application->home_district = $request->district;
            // $application->home_contact_name = $request->contact;
            // $application->home_contact_phone = $request->phone;
            $application->home_street = $request->street;
            $application->home_zipcode = $request->zipcode;
            $application->save();
        }
        $data['code'] = 0;
        $data['msg'] = "Personal information Update Successfully";
        return response()->json($data);
    }
    function applicationPostAddress(Request $request, $id)
    {
        // return $request;
        Log::info('Request Data:', $request->all());
        $application = StudentApplication::find($id);
        if ($application) {
            $application->current_country = $request->country;
            $application->current_city = $request->city;
            $application->current_district = $request->district;
            // $application->current_contact_name = $request->contact;
            // $application->current_contact_phone = $request->phone;
            $application->current_street = $request->street;
            $application->current_zipcode = $request->zipcode;
            $application->save();
        }
        $data['code'] = 0;
        $data['msg'] = "Personal information Update Successfully";
        return response()->json($data);
    }
    function applicationEducation(Request $request, $id)
    {
        // return $request;
        // Log::info('Request Data:', $request->education_data);
        $application = StudentApplication::find($id);
        if ($request->education_data) {
            $old_ids = [];
            foreach ($request->education_data as $k => $education_data_field) {
                if (isset($education_data_field['education_fields']) == false) {
                    $old_ids[] = $education_data_field['id'];
                }
            }
            if (count($old_ids) > 0) {
                ApplicationEducation::whereNotIn('id', $old_ids)->delete();
            }
            foreach ($request->education_data as $k => $education_data_field) {
                if (isset($education_data_field['education_fields'])) {
                    //return $education_data_field['education_fields'][$k];
                    $field = $education_data_field['education_fields'][$k];
                    $studentEducation = new ApplicationEducation;
                    $studentEducation->application_id = $application->id;
                    $studentEducation->user_id = $application->user_id;
                    $studentEducation->country = $field['country'];
                    $studentEducation->education_level = $field['education_level'];
                    // $studentEducation->gpa_type = $field['gpa'];
                    // $studentEducation->major = $field['major'];
                    $studentEducation->end_date = $field['month_finished'];
                    $studentEducation->start_date = $field['month_started'];
                    $studentEducation->school = $field['school'];
                    $studentEducation->field = $field['field'];
                    $studentEducation->save();
                } else {
                    $field = $education_data_field;
                    $studentEducation =  ApplicationEducation::find($field['id']);

                    $studentEducation->country = $field['country'];
                    $studentEducation->education_level = $field['education_level'];
                    // $studentEducation->gpa_type = $field['gpa'];
                    // $studentEducation->major = $field['major'];
                    $studentEducation->end_date = $field['month_finished'];
                    $studentEducation->start_date = $field['month_started'];
                    $studentEducation->school = $field['school'];
                    $studentEducation->field = $field['field'];
                    $studentEducation->save();
                }
            }
        }
        $data['code'] = 0;
        $data['msg'] = "Education information Update Successfully";
        return response()->json($data);
    }
    function applicationWorkExperience(Request $request, $id)
    {
        // return $request;
        // Log::info('Request Data:', $request->all());
        $application = StudentApplication::find($id);
        if ($request->work_data) {
            $old_ids = [];
            foreach ($request->work_data as $k => $work_data_field) {
                if (isset($work_data_field['work_data']) == false) {
                    $old_ids[] = $work_data_field['id'];
                }
            }
            if (count($old_ids) > 0) {
                ApplicationWork::whereNotIn('id', $old_ids)->delete();
            }
            foreach ($request->work_data as $k => $work_data_field) {
                if (isset($work_data_field['work_data'])) {
                    $field = $work_data_field['work_data'][$k];
                    $studentwork = new ApplicationWork;
                    $studentwork->application_id = $application->id;
                    $studentwork->user_id = $application->user_id;
                    $studentwork->company = $field['employer'];
                    $studentwork->job_title = $field['job_title'];
                    $studentwork->end_date = $field['month_finished'];
                    $studentwork->start_date = $field['month_started'];
                    $studentwork->save();
                } else {
                    $field = $work_data_field;
                    $studentwork =  ApplicationWork::find($field['id']);

                    $studentwork->company = $field['employer'];
                    $studentwork->job_title = $field['job_title'];
                    $studentwork->end_date = $field['month_finished'];
                    $studentwork->start_date = $field['month_started'];
                    $studentwork->save();
                }
            }
        }
        $data['code'] = 0;
        $data['msg'] = "Work Experience information Update Successfully";
        return response()->json($data);
    }
    function applicationFamilyFinance(Request $request, $id)
    {
        //  return $request;
        // Log::info('Request Data:', $request->all());
        $application = StudentApplication::find($id);
        if ($application) {
            $application->father_name = $request->family_member_name;
            $application->father_email = $request->family_member_email;
            $application->father_phone = $request->family_member_phone;
            $application->father_nationlity = $request->family_member_nationality;
            $application->father_workplace = $request->family_member_work_employer;
            $application->father_position = $request->family_member_work_position;
            $application->birthdate_of_father = $request->family_member_work_date_of_birth;

            $application->mother_name = $request->family_member1_name;
            $application->mother_email = $request->family_member1_email;
            $application->mother_phone = $request->family_member1_phone;
            $application->mother_nationlity = $request->family_member1_nationality;
            $application->mother_workplace = $request->family_member1_work_employer;
            $application->mother_position = $request->family_member1_work_position;
            $application->birthdate_of_mother = $request->family_member1_work_date_of_birth;


            $application->guarantor_name = $request->supporter_name;
            $application->guarantor_email = $request->supporter_email;
            $application->guarantor_phone = $request->supporter_phone;
            $application->guarantor_address = $request->supporter_address;
            $application->guarantor_workplace = $request->supporter_company;
            $application->guarantor_work_address = $request->supporter_company_address;
            $application->guarantor_relationship = $request->supporter_relationship;
            $application->guarantor_inter_relation = $request->inlineRadioOptions;
            $application->study_fund = $request->fund;
            $application->scholarship = $request->scholarship;
            $application->emergency_contact_name = $request->emergency_contact_name;
            $application->emergency_contact_phone = $request->emergency_contact_phone;
            $application->emergency_contact_email = $request->emergency_contact_email;
            $application->emergency_contact_address = $request->emergency_contact_address;

            $application->save();
        }
        $data['code'] = 0;
        $data['msg'] = "Family information Update Successfully";
        return response()->json($data);
    }
    function applicationOptionalService(Request $request, $id)
    {
        $application = StudentApplication::find($id);
        if ($application) {
            $application->service_id = $request->optional_service;
            $application->save();
        }
        $data['code'] = 0;
        $data['msg'] = "Option Service Update Successfully";
        return response()->json($data);
    }

    
    // function applicationAttachmentUpload(Request $request, $id)
    // {

    //     try {
    //         DB::beginTransaction();
    //         $application = StudentApplication::find($id);

    //         $filename = time() . 'application_file' . '.' . $request->file->getClientOriginalName();
    //         $request->file->move(public_path('upload/application/' . $application->id), $filename);
    //         $document = new ApplicationDocument;
    //         $document->application_id = $application->id;
    //         $document->user_id = $application->user_id;
    //         $document->document_name = $request->title;
    //         $document->document_type = 'fixed';
    //         $document->document_file = $filename;
    //         $document->extensions = $request->file->getClientOriginalExtension();
    //         $document->save();
    //         $order = $request->order;
    //         DB::commit();
    //         $data['code'] = 0;
    //         $data['msg'] = "Image Upload Successfully!";
    //         $data["doc_view"] = view('Backend.student_appliction.ajax_document_load', compact('document', 'order'))->render();
    //         return response()->json($data);
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         $data['code'] = -1;
    //         $data['err'] = $e->getMessage();
    //         $data['msg'] = "Something went wrong";
    //         return response()->json($data);
    //     }
    // }

    function applicationAttachmentUpload(Request $request, $id)
    {
            // Log::info('Request Data:', $request->all());
        
        try {
            DB::beginTransaction();
            $application = StudentApplication::find($id);

            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('upload/application/' . $application->id), $filename);

                    $document = new ApplicationDocument;
                    $document->application_id = $application->id;
                    $document->user_id = $application->user_id;
                    $document->document_name = $request->category;
                    $document->document_type = 'fixed';
                    $document->document_file = $filename;
                    $document->extensions = $file->getClientOriginalExtension();
                    $document->save();
                }
            }

            DB::commit();
            $data['code'] = 0;
            $data['msg'] = "Documents uploaded successfully!";
            return response()->json($data);
        } catch (\Exception $e) {
            DB::rollBack();
            $data['code'] = -1;
            $data['err'] = $e->getMessage();
            $data['msg'] = "Something went wrong!";
            return response()->json($data);
        }
    }

    public function deleteAttachment(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $application = StudentApplication::find($id);

            // Find the document by file name
            $document = ApplicationDocument::where('application_id', $application->id)
                ->where('document_file', $request->file_name)
                ->first();

            if ($document) {
                // Delete the physical file
                $filePath = public_path('upload/application/' . $application->id . '/' . $document->document_file);
                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the file
                }

                // Remove the database record
                $document->delete();
            }

            DB::commit();

            return response()->json(['code' => 0, 'msg' => 'File deleted successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['code' => -1, 'err' => $e->getMessage(), 'msg' => 'Failed to delete the file.']);
        }
    }



    
    function applicationGetAttachments(Request $request, $id)
    {
        $application = StudentApplication::find($id);
        $documents = ApplicationDocument::where("application_id", $application->id)->get();
        $data['code'] = 0;
        $data['documents'] = $documents;
        $data['msg'] = "Load Successfully!";
        return response()->json($data);
    }
    
    function attachmentDownload(Request $request, $id)
    {
        // return $request->all();
        $document = ApplicationDocument::find($request->attachment_code);
        $path = asset('upload/application/' . $id . '/' . $document->document_file);
        // $mimeType = File::mimeType($path);
        $extension = File::extension($path);

        // $source = file_get_contents($path);
        // $base64 = base64_encode($source);
        // $blob = 'data:'.$mimeType.';base64,'.$base64;



        $data['code'] = 0;
        $data['file_url'] = $path;
        $data['filename'] = $document->document_name . '.' . $extension;
        // $data['blob'] = $blob;
        // $data['type'] = $mimeType;
        $data['msg'] = "Load Successfully!";
        return response()->json($data);
    }
    function attachmentDelete(Request $request, $id)
    {
        $document = ApplicationDocument::find($request->attachment_code);
        $document->delete();
        $data['code'] = 0;

        $data['msg'] = "Delete Successfully!";
        return response()->json($data);
    }


    public function submitAppliction(Request $request, $id)
    {
        $partner_ref_id = session('partner_ref_id') ?? '';
        $application = StudentApplication::find($id);

        if ($application) {
            $application->status = 1;
            $application->payment_method = $request->payment_method;

            $new_student = '';
            if (empty($application->user_id)) {
                try {
                    $new_student = new User();
                    $new_student->email = $application->email;
                    $new_student->name = $application->first_name . ' ' . $application->last_name;
                    $new_student->password = Hash::make($application->application_code);
                    $new_student->type = 1;
                    $new_student->status = 1;
                    $new_student->country = $application->nationality;
                    $new_student->mobile = $application->phone;
                    $new_student->address = $application->current_street . ', ' . $application->current_city . ', ' . $application->current_district . ', ' . $application->current_country;
    
                    $new_student->save();
                    $application->user_id = $new_student->id;
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', $e->getMessage());
                }
            }
            
            $application->save();

            //Notification Start
            $admins = User::where('type', 0)->get();

            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $application->id;
                $notification->text = 'New Application Submitted';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $student = auth()->user() ?? $new_student ?? '';

            if ($student) {
                $consultant = User::where('continent_id', $student->continent_id)
                    ->where('type', 7)
                    ->where('id', '!=', $student->id)
                    ->first();
            } elseif (session('partner_ref_id') || $request->query('partner_ref_id')) {
                $partner_ref_id = session('partner_ref_id') ?? $request->query('partner_ref_id');

                $consultant = User::where('id', base64_decode($partner_ref_id))
                    ->where('type', 7)
                    ->first();
            } else {
                $consultant = null;
            }

            if ($consultant) {
                $notification = new Notification();
                $notification->relation_id = $application->id;
                $notification->text = 'New Application Submitted';
                $notification->user_id = $consultant ? $consultant->id : '';
                $notification->type = 'university';
                $notification->save();
            } else {
                $data['consultant'] = null;
            }

            $notification = new Notification();
            $notification->relation_id = $application->id;
            $notification->text = 'Applied successfully';
            $notification->user_id = auth()->user()->id ?? null;
            $notification->type = 'university';
            $notification->save();
            //Notification  End

            $message = 'You have successfully submitted the application form, please wait, we will respond as soon as possible. Thank you.';

            if ($partner_ref_id && !auth()->check()) {
                return redirect()->route('frontend.my_application_list', ['application' => $application->id, 'partner_ref_id' => $partner_ref_id])->with('message', $message);
            } else {
                return redirect()->route('user.order_list', $partner_ref_id ? ['partner_ref_id' => $partner_ref_id] : [])->with('message', $message);
            }
        }

        $data['code'] = 0;
        $data['msg'] = "Appliction Submitted Successfully";
        return response()->json($data);
    }

    public function myOrderedApplication(Request $request)
    {
        $data['application'] = StudentApplication::find($request->application);
        $data['partner'] = User::find(base64_decode($request->partner_ref_id));

        return view('Frontend.university.application_success', $data);
    }

    function indexAjax(Request $request)
    {
        $columns = array(
            0 => 'id',
            1 => 'application_code',
            2 => 'user_name',
            3 => 'email',
            4 => 'phone',
            5 => 'created_at',
            6 => 'payment_status',
            6 => 'status',
            6 => 'action',
        );
        $totalData = StudentApplication::count();

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        $search = $request->input('search.value');

        //====DataTale Default Filtering=====    
        if (empty($search)) {
            $users = StudentApplication::query();
            if ($request->input('application_status') != '') {
                $users = $users->where('status', $request->input('application_status'));
            }
            if ($request->input('payment_status') != '') {
                $users = $users->where('payment_status', $request->input('payment_status'));
            }
            $totalFiltered = $users->count();
            $users = $users->offset($start)->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {

            $users = StudentApplication::where(function ($query) use ($search) {
                // $q->where("vendor_name","LIKE","%{$search}%");
                $query->where("application_code", "LIKE", "%{$search}%")
                    ->OrWhere("created_at", "LIKE", "%{$search}%")
                    ->orWhereHas('carts.course', function ($q) use ($search) {
                        $q->where("name", "LIKE", "%{$search}%")
                            ->orwhereHas('university', function ($query2) use ($search) {
                                $query2->where("name", "LIKE", "%{$search}%");
                            });
                    })
                    ->orwhereHas('student', function ($query3) use ($search) {
                        $query3->where("name", "LIKE", "%{$search}%");
                    });
            });
            // return json_encode(DB::getQueryLog()); 

            if (!empty($request->input('application_status'))) {
                $users = $users->where('status', $request->input('application_status'));
            }
            if (!empty($request->input('payment_status'))) {

                $users = $users->where('payment_status', $request->input('payment_status'));
            }
            $totalFiltered = $users->count();
            $users = $users->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        }
        //======================

        $data = array();
        if (!empty($users)) {
            $i = $start == 0 ? 1 : $start + 1;
            foreach ($users as $user) {
                // $nestedData['id'] = $i++;
                $nestedData['application_code'] = $user->application_code;
                $nestedData['user_name'] = $user->student?->name;
                // $nestedData['email'] = $user->student?->email;
                $nestedData['phone'] = $user->student?->mobile;


                $nestedData['apply_date'] = $user->created_at->format('Y-m-d');
                if ($user->payment_status == 1) {
                    $nestedData['paid_status'] = 'Paid';
                } else {
                    $nestedData['paid_status'] = 'Not PAid';
                }
                if ($user->status == 0) {
                    $nestedData['status'] = 'Not Complete';
                } else if ($user->status == 1) {
                    $nestedData['status'] = 'Processing';
                } else if ($user->status == 2) {
                    $nestedData['status'] = 'Approved';
                } else if ($user->status == 3) {
                    $nestedData['status'] = 'Cancel';
                } else if ($user->status == 4) {
                    $nestedData['status'] = 'Not Submitted';
                } else if ($user->status == 5) {
                    $nestedData['status'] = 'Submitted';
                } else if ($user->status == 6) {
                    $nestedData['status'] = 'Pending';
                } else if ($user->status == 7) {
                    $nestedData['status'] = 'E-documents Qualified';
                } else if ($user->status == 8) {
                    $nestedData['status'] = 'Waiting Processing';
                } else if ($user->status == 9) {
                    $nestedData['status'] = 'Processing';
                } else if ($user->status == 10) {
                    $nestedData['status'] = 'More Documents Needed';
                } else if ($user->status == 11) {
                    $nestedData['status'] = 'Re-Submitted';
                } else if ($user->status == 12) {
                    $nestedData['status'] = 'Rejected';
                } else if ($user->status == 13) {
                    $nestedData['status'] = 'Transferred';
                } else if ($user->status == 14) {
                    $nestedData['status'] = 'Accepted';
                } else if ($user->status == 15) {
                    $nestedData['status'] = 'E-offer Delivered';
                } else if ($user->status == 15) {
                    $nestedData['status'] = 'Offer Delivered';
                } else {
                    $nestedData['status'] = '--';
                }
                $nestedData['action'] = "";
                $nestedData['action'] .= '<button style="margin-bottom: 2px; background-color: #448bff; color: #fff; margin: 1px" type="button" data-toggle="modal" data-target="#certificateModal' . $user->id . '" class="btn"><i class="fa-solid fa-edit"></i> </button>';
                $nestedData['action'] .= '<a style="margin-bottom: 2px; background-color: #448bff; color: #fff; margin: 1px" href="' . route('frontend.application-details', $user->id) . '" class="btn"><i class="fa-duotone fa fa-eye"></i> </a>';


                $nestedData['action'] .= '<button  class="btn delete-button" style="background-color: #448bff; color: #fff; margin: 1px" courseId="' . $user->id . '"><i class="icon fa fa-trash tx-28"></i></button>';
                $nestedData['action'] .= '<a class="btn" style="background-color: #448bff; color: #fff; margin: 1px" href="' . route('consultent.application-form-download',  $user->id) . '"><i class="fa fa-solid fa-download"></i></a>';
                $nestedData['action'] .= '<a class="btn" style="background-color: #448bff; color: #fff; margin: 1px" href="' . route('consultent.student_appliction_edit',  $user->id) . '"><i class="fa-solid fa-file-pen"></i></a>';
                $nestedData['action'] .= view('user.consultants.student_appliction.modal_certificate_ajax', ['application' => $user])->render();

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        return json_encode($json_data);
    }
}