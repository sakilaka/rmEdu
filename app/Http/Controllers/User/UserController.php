<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ApplicationDocument;
use App\Models\ApplicationEducation;
use App\Models\ApplicationWork;
use App\Models\Cart;
use App\Models\Certificate;
use App\Models\Continent;
use App\Models\Country;
use App\Models\Course;
use App\Models\CourseSave;
use App\Models\EventCart;
use App\Models\EventParticipant;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Package;
use App\Models\Page;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\CourseParticipant;
use App\Models\Ebook;
use App\Models\StudentApplication;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    public function index()
    {
        // return view('user.index');
        // return view('User-Backend.profile.profile');
        return redirect(route('user.dashboard'));
    }

    public function dashboard(Request $request)
    {
        $daily = "";
        $monthly = "";
        $yearly = "";

        if ($request->filter == 'daily') {
            DB::statement("SET SQL_MODE=''");
            $data['course'] = Course::whereDate('created_at', Carbon::today())->where('teacher_id', auth()->user()->id)->get();
            $data['order'] = StudentApplication::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->where('status', 1)->get();
            $data['package'] = Order::whereDate('created_at', Carbon::today())->where('order_type', 'coursepackage')->where('user_id', auth()->user()->id)->get();
            $data['event'] = EventCart::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $data['ebook'] = Ebook::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $students = CourseParticipant::leftJoin('courses', 'courses.id', 'course_participants.course_id')
                ->where('courses.teacher_id', auth()->user()->id);
            $data['p_students'] = $students->get();
            $data['students'] = $students->groupBy('course_participants.user_id')->get();
        } else if ($request->filter == 'monthly') {
            DB::statement("SET SQL_MODE=''");
            $data['course'] = Course::whereMonth('created_at', now()->month)->where('teacher_id', auth()->user()->id)->get();
            $data['orders'] = StudentApplication::whereMonth('created_at', now()->month)->where('user_id', auth()->user()->id)->where('status', 1)->get();
            $data['package'] = Order::whereMonth('created_at', now()->month)->where('order_type', 'coursepackage')->where('user_id', auth()->user()->id)->get();
            $data['event'] = EventCart::whereMonth('created_at', now()->month)->where('user_id', auth()->user()->id)->get();
            $data['ebook'] = Ebook::whereMonth('created_at', now()->month)->where('user_id', auth()->user()->id)->get();
            $students = CourseParticipant::leftJoin('courses', 'courses.id', 'course_participants.course_id')
                ->where('courses.teacher_id', auth()->user()->id);
            $data['p_students'] = $students->get();
            $data['students'] = $students->groupBy('course_participants.user_id')->get();
        } else if ($request->filter == 'yearly') {
            DB::statement("SET SQL_MODE=''");
            $data['course'] = Course::whereYear('created_at', now()->year)->where('teacher_id', auth()->user()->id)->get();
            $data['orders'] = StudentApplication::whereYear('created_at', now()->year)->where('user_id', auth()->user()->id)->where('status', 1)->get();
            $data['package'] = Order::whereYear('created_at', now()->year)->where('order_type', 'coursepackage')->where('user_id', auth()->user()->id)->get();
            $data['event'] = EventCart::whereYear('created_at', now()->year)->where('user_id', auth()->user()->id)->get();
            $data['ebook'] = Ebook::whereYear('created_at', now()->year)->where('user_id', auth()->user()->id)->get();
            $students = CourseParticipant::leftJoin('courses', 'courses.id', 'course_participants.course_id')
                ->where('courses.teacher_id', auth()->user()->id);
            $data['p_students'] = $students->get();
            $data['students'] = $students->groupBy('course_participants.user_id')->get();
        } else {
            DB::statement("SET SQL_MODE=''");
            $data['course'] = Course::whereDate('created_at', Carbon::today())->where('teacher_id', auth()->user()->id)->get();
            $data['orders'] = StudentApplication::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->where('status', 1)->get();
            $data['package'] = Order::whereDate('created_at', Carbon::today())->where('order_type', 'coursepackage')->where('user_id', auth()->user()->id)->get();
            $data['event'] = EventCart::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $data['ebook'] = Ebook::whereDate('created_at', Carbon::today())->where('user_id', auth()->user()->id)->get();
            $students = CourseParticipant::leftJoin('courses', 'courses.id', 'course_participants.course_id')
                ->where('courses.teacher_id', auth()->user()->id);
            $data['p_students'] = $students->get();
            $data['students'] = $students->groupBy('course_participants.user_id')->get();
        }

        if (Auth::user()->type == 7) {
            $data['orders'] = StudentApplication::where('partner_ref_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        } elseif (Auth::user()->type == 1) {
            $data['orders'] = StudentApplication::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        }

        $data['daily'] = $daily;
        $data['monthly'] = $monthly;
        $data['yearly'] = $yearly;

        $data['countries'] = Country::all();

        $student = auth()->user();
        $data['consultant'] = User::where('id', $student->partner_ref_id)
            ->first();

        // return view('user.dashboard', $data);
        return view('User-Backend.index', $data);
    }

    public function managePartnerBanner(Request $request)
    {
        $data['user_profile_banner'] = Auth::user()->user_profile_banner;
        return view('User-Backend.manage_partner_banner', $data);
    }

    public function updatePartnerBanner(Request $request, $user_id)
    {
        if ($request->hasFile('user_profile_banner')) {
            $pic = $request->file('user_profile_banner');
            $pic_data = base64_encode(file_get_contents($pic->path()));
            $image_url = 'data:image/' . $pic->getClientOriginalExtension() . ';base64,' . $pic_data;
        }

        $data = [
            'user_profile_banner' => $image_url
        ];

        User::where('id', $user_id)->update($data);

        return redirect()->back()->with('success', 'Profile Banner Updated');
    }

    public function myCourseList()
    {
        return view('user.customer.my_course_list');
    }

    public function myOrderList()
    {
        $data['my_orders'] = Cart::where('user_id', auth()->user()->id)->get();
        return view('user.customer.my_order_list', $data);
    }

    public function myOrder(Request $request)
    {
        $user = auth()->user();

        /* if (!$user) {
            if (session('partner_ref_id') || $request->query('partner_ref_id')) {
                $partner_ref_id = session('partner_ref_id') ?? $request->query('partner_ref_id');
    
                $user = User::find(base64_decode($partner_ref_id));
            }
        } */

        if ($user->type == 1) {
            $data['orders'] = StudentApplication::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        } elseif ($user->type == 7) {
            $data['orders'] = StudentApplication::where(['partner_ref_id' => auth()->user()->id, 'is_applied_partner' => 1])->orderBy('id', 'desc')->get();
        }

        $data['consultant'] = User::where('continent_id', $user->continent_id)
            ->where('type', 7)->where('status', 1)
            ->where('id', '!=', $user->id)
            ->first();

        // return view('user.order.index', $data);
        return view('User-Backend.application_list', $data);
    }
    public function myOrderInvoice($id)
    {
        $data['orderdetails'] = StudentApplication::find($id);
        return view('user.order.invoice', $data);
    }

    public function myOrderDetails($id)
    {
        $data['s_appliction'] = StudentApplication::with('educations','documents','work_experiences' )->where('id', $id)->first();
        // dd($data['s_appliction']); 
        return view('User-Backend.application_view', $data);
    }
    

    public function destroy(Request $request)
    {

        $studentapplication = StudentApplication::find($request->order_id);
        //dd($request->order_id);
        foreach ($studentapplication->carts as $cart) {
            $cart->delete();
        }

        foreach ($studentapplication->educations as $education) {
            $education->delete();
        }

        foreach ($studentapplication->work_experiences as $work_experience) {
            $work_experience->delete();
        }

        foreach ($studentapplication->documents as $document) {
            @unlink(public_path('upload/application/{$request->order_id}/' . $document->document_file));
            $document->delete();
        }

        foreach ($studentapplication->notifications as $notification) {
            $notification->delete();
        }

        // $filePath = public_path("upload/application/{$file->application_id}/{$file->document_file}");

        $studentapplication->delete();
        return back()->with('success', 'Application Deleted Successfully');
    }

    // public function CourseOrderDetails($id)
    // {
    //    $data['orderdetails'] = Order::find($id);
    //    $data['site_setting'] = SiteSetting::first();
    //    return view('Backend.order.courseorder.details', $data);
    // }
    function myOrderPrint($id)
    {
        //    $data['orderdetails'] = Order::find($id);
        $data['orderdetails'] = StudentApplication::find($id);
        //    $data['site_setting'] = SiteSetting::first();
        return view('user.order.print', $data);
    }

    public function myPackageList()
    {
        $data['my_package'] = Cart::where('user_id', auth()->user()->id)->where('cart_type', 'packagecart')->get();
        return view('user.customer.my_package_list', $data);
    }

    public function myEventList()
    {
        $data['my_events'] = EventCart::where('user_id', auth()->user()->id)->get();
        // return view('user.customer.my_event_list', $data);
        return view('User-Backend.event_list', $data);
    }
    public function updateUserPic(Request $request, $id)
    {
        try {
            $user = User::find(auth()->user()->id);
            if ($request->new_image) {
                $path = public_path("upload/users/" . $user->image);
                @unlink($path);
                $fileName = time() . '_user_image.' . request()->new_image->getClientOriginalExtension();
                request()->new_image->move(public_path('upload/users'), $fileName);
                $user->image = $fileName;
            } else {
                $user->image = $request->image;
            }
            $user->update();
            return redirect()->back()->with('success', 'Profile Updated Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function editUserInfo($id)
    {
        $data['user'] = User::find($id);
        $data['countries'] = Country::where('status', 1)->orderBy('name', 'asc')->get();
        $data['continents'] = Continent::where('status', 1)->orderBy('name', 'asc')->get();
        // return view('user.update_profile', $data);
        return view('User-Backend.profile.profile_edit', $data);
    }
    public function updateUserInfo(Request $request, $id)
    {
        try {
            $user = User::find(auth()->user()->id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->gender = $request->gender;
            $user->nid = $request->nid;
            $user->dob = $request->dob;

            $user->qualification = $request->qualification;
            $user->experience = $request->experience;
            $user->language = $request->language;
            $user->country = $request->country;
            //$user->continent = $request->continent;
            $user->continent_id = $request->continent_id;

            $user->address = $request->address;
            $user->institution = $request->institution ?? '';
            $user->designation = $request->designation ?? '';
            $user->description = $request->description;

            //Bank Information
            $user->bank_name = $request->bank_name;
            $user->bank_code_ifsc = $request->bank_code_ifsc;
            $user->bank_account_number = $request->bank_account_number;
            $user->bank_ac_holder_name = $request->bank_ac_holder_name;
            $user->paypal_id_num = $request->paypal_id_num;

            //Social Information
            $user->facebook_url = $request->facebook_url;
            $user->twitter_url = $request->twitter_url;
            $user->google_plus_url = $request->google_plus_url;
            $user->instagram_url = $request->instagram_url;

            // update user image
            if ($request->new_image) {
                $path = public_path("upload/users/" . $user->image);
                @unlink($path);
                $fileName = time() . '_user_image.' . request()->new_image->getClientOriginalExtension();
                request()->new_image->move(public_path('upload/users'), $fileName);
                $user->image = $fileName;
            }

            $user->update();

            //add certificate file
            if ($request->certificates_file) {
                foreach ($request->certificates_file as $k => $value) {
                    $certificates = new Certificate();
                    $certificates->user_id = $user->id;
                    $certificates->certificates_name = $request->certificates_name[$k];
                    $filename = $request->certificates_name[$k] . '-' . $user->name . '_certificat_file' . '.' . $value->getClientOriginalExtension();
                    $value->move(public_path('upload/certificates/'), $filename);
                    $certificates->certificates_file = $filename;
                    $certificates->extension = $value->getClientOriginalExtension();
                    $certificates->save();
                }
            }

            //Update certificate file
            if ($request->old_certificates_name) {
                foreach ($request->old_certificates_name as $k => $value) {
                    $certificates = Certificate::find($k);
                    $certificates->user_id = $user->id;
                    $certificates->certificates_name = $value;

                    if (isset($request->file('old_certificates_file')[$k])) {
                        @unlink(public_path('upload/certificates/' . $certificates->certificates_file));
                        $filename = $request->old_certificates_name[$k] . '-' . $user->name . '_certificat_file' . '.' . $request->file('old_certificates_file')[$k]->getClientOriginalExtension();
                        $request->file('old_certificates_file')[$k]->move(public_path('upload/certificates/'), $filename);
                        $certificates->certificates_file = $filename;
                        $certificates->extension = $request->file('old_certificates_file')[$k]->getClientOriginalExtension();
                    }

                    $certificates->update();
                }
            }

            //delete certificate file
            if ($request->delete_certificates_file) {
                foreach ($request->delete_certificates_file as $k => $value) {
                    $audio = Certificate::find($value);
                    @unlink(public_path('upload/certificates/' . $audio->certificates_file));
                    $audio->delete();
                }
            }
            return redirect()->route('user.dashboard')->with('success', 'Profile Updated Successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong, Please try again. ');
        }
    }

    public function notification()
    {
        $data['notifications'] = Notification::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(12);
        // return view('user.my_notification', $data);
        return view('User-Backend.notifications', $data);
    }

    public function privacy() //all user
    {
        $data['privacy'] = Page::where('template', 'privacy-policy')->first();
        $data['terms_conditions'] = Page::where('template', 'terms-conditions')->first();
        return view('user.privacy_policy', $data);
    }
    public function wishlist()
    {
        $data['saves'] = CourseSave::where('user_id', auth()->user()->id)->get();

        // return view('user.customer.my_wishlist', $data);
        return view('User-Backend.wishlist', $data);
    }

    public function myNotifications()
    {
        $user = Auth::user();
        if ($user && $user->type == 1) {
            $data['notifications'] = Notification::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        } elseif ($user && $user->type == 7) {
            $data['notifications'] = Notification::where('partner_id', $user->id)->orderBy('id', 'desc')->get();
        }

        return view('User-Backend.all_notification', $data);
    }


    // Withdrawal start
    public function manageWithdrawal()
    {
        $data['bank'] = User::find(auth()->user()->id);
        $data['withdrawals'] = Withdrawal::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return view('user.withdrawal.index', $data);
    }
    public function createWithdrawal()
    {

        $data['w_fee'] = \App\Models\Tp_option::where('option_name', 'commission')->first();
        $data['bank'] = User::find(auth()->user()->id);
        return view('user.withdrawal.create', $data);
    }

    public function storWithdrawal(Request $request)
    {

        $user = User::find(auth()->user()->id);
        // dd($user);
        if ($user->current_balance < $request->amount) {

            return redirect()->back()->with('warning', 'Insufficient balance');
        } else {
            $withdrawal = new Withdrawal();
            $withdrawal->user_id = auth()->user()->id;
            $withdrawal->amount =  $request->amount;
            $withdrawal->fee = $request->fee;
            $withdrawal->payment_method = $request->payment_method;
            $withdrawal->note = $request->note;
            $withdrawal->save();
        }

        // $withdrawal = new Withdrawal();
        // $withdrawal->user_id = auth()->user()->id;
        // $withdrawal->amount = $request->amount;
        // $withdrawal->fee = $request->fee;
        // $withdrawal->payment_method = $request->payment_method;
        // $withdrawal->note = $request->note;
        // $withdrawal->save();

        return redirect()->route('frontend.manage_withdrawal')->with('success', 'Your order is processing');
    }
    public function editWithdrawal($id)
    {
        $data['w_fee'] = \App\Models\Tp_option::where('option_name', 'commission')->first();
        $data['withdrawal'] = Withdrawal::find($id);
        $data['bank'] = User::find(auth()->user()->id);
        return view('user.withdrawal.update', $data);
    }
    public function updateWithdrawal(Request $request, $id)
    {
        // $withdrawal = Withdrawal::find($id);
        // $withdrawal->user_id = auth()->user()->id;
        // $withdrawal->amount = $request->amount;
        // $withdrawal->fee = $request->fee;
        // $withdrawal->payment_method = $request->payment_method;
        // $withdrawal->note = $request->note;
        // $withdrawal->update();

        $user = User::find(auth()->user()->id);
        if ($user->current_balance < $request->amount) {

            return redirect()->back()->with('warning', 'Insufficient balance');
        } else {
            $withdrawal = Withdrawal::find($id);
            $withdrawal->user_id = auth()->user()->id;
            $withdrawal->amount = $request->amount;
            $withdrawal->fee = $request->fee;
            $withdrawal->payment_method = $request->payment_method;
            $withdrawal->note = $request->note;
            $withdrawal->update();
        }
        return redirect()->route('frontend.manage_withdrawal')->with('success', 'Your order is processing.');
    }

    //partner manage student start
    public function manageStudent()
    {
        $consultant = auth()->user();
        if ($consultant->type != 7) {
            abort(403, 'Unauthorized Access!');
        }

        $data['students'] = User::orderBy('id', 'desc')
            ->where([
                'partner_ref_id' => $consultant->id,
                'type' => 1,
            ])
            ->where('id', '!=', $consultant->id)
            ->where('status', '!=', 0)
            ->get();

        return view('User-Backend.partner_application_manage.partner_manage_students', $data);
    }
    public function manageApplication()
    {
        $consultant = auth()->user();

        $data['applications'] = StudentApplication::where(['partner_ref_id' => $consultant->id, 'is_applied_partner' => null])
            ->orderBy('id', 'desc')
            ->get();

        // return view('user.consultants.index', $data);
        return view('User-Backend.partner_application_manage.partner_manage_application', $data);
    }

    public function manageApplicationInvoice($id)
    {
        $data['orderdetails'] = StudentApplication::find($id);
        return view('User-Backend.partner_application_manage.partner_application_invoice', $data);
    }

    public function manageApplicationInvoicePrint($id)
    {
        $data['orderdetails'] = StudentApplication::find($id);
        return view('User-Backend.partner_application_manage.partner_application_invoice_print', $data);
    }

    public function applicationDetails($id)
    {
        // $data['s_appliction'] = StudentApplication::find($id);
        $data['s_appliction'] = StudentApplication::with('educations','documents','work_experiences' )->where('id', $id)->first();

        // return view('user.consultants.application_details', $data);
        return view('User-Backend.partner_application_manage.partner_view_application', $data);
    }

    public function applicationFileDownload($id)
    {
        $file = ApplicationDocument::find($id);

        if (!$file) {
            abort(404, 'File not found');
        }

        $filePath = public_path("upload/application/{$file->application_id}/{$file->document_file}");

        if (!file_exists($filePath)) {
            abort(404, 'File not found');
        }

        return response()->download($filePath);
    }



    public function studentDetails($id)
    {
        $data['student'] = User::find($id);
        // return view('user.consultants.student_details', $data);
        return view('User-Backend.partner_application_manage.partner_student_details', $data);
    }

    public function studentEdit($id)
    {
        $data["student"] = $student = User::find($id);
        $data['continents'] = Continent::where('status', 1)->get();
        $data['countries'] = Country::where('continent_id', @$student->continent_id)->get();
        return view('User-Backend.partner_application_manage.partner_student_edit', $data);
    }

    public function studentUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'mobile' => ['required'],

        ]);
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->nid = $request->nid;
            $user->gender = $request->gender;

            $user->qualification = $request->qualification;
            $user->experience = $request->experience;
            $user->language = $request->language;
            $user->country = $request->country;
            $user->continent_id = $request->continent_id;


            $user->dob = $request->dob;
            $user->type = 1;
            $user->address = $request->address ?? "";
            $user->description = $request->description ?? "";


            if ($request->hasFile('image')) {
                @unlink(public_path('upload/users/' . $user->image));
                $fileName = rand() . time() . '_student.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/users/'), $fileName);
                $user->image = $fileName;
            }
            $user->save();


            //add certificate file
            if ($request->certificates_file) {
                foreach ($request->certificates_file as $k => $value) {
                    $certificates = new Certificate();
                    $certificates->user_id = $user->id;
                    $certificates->certificates_name = $request->certificates_name[$k];
                    $filename = $request->certificates_name[$k] . '-' . $user->name . '_certificat_file' . '.' . $value->getClientOriginalExtension();
                    $value->move(public_path('upload/certificates/'), $filename);
                    $certificates->certificates_file = $filename;
                    $certificates->extension = $value->getClientOriginalExtension();
                    $certificates->save();
                }
            }

            //Update certificate file
            if ($request->old_certificates_name) {
                foreach ($request->old_certificates_name as $k => $value) {
                    $certificates = Certificate::find($k);
                    $certificates->user_id = $user->id;
                    $certificates->certificates_name = $value;

                    if (isset($request->file('old_certificates_file')[$k])) {
                        @unlink(public_path('upload/certificates/' . $certificates->certificates_file));
                        $filename = $request->old_certificates_name[$k] . '-' . $user->name . '_certificat_file' . '.' . $request->file('old_certificates_file')[$k]->getClientOriginalExtension();
                        $request->file('old_certificates_file')[$k]->move(public_path('upload/certificates/'), $filename);
                        $certificates->certificates_file = $filename;
                        $certificates->extension = $request->file('old_certificates_file')[$k]->getClientOriginalExtension();
                    }

                    $certificates->update();
                }
            }

            //delete certificate file
            if ($request->delete_certificates_file) {
                foreach ($request->delete_certificates_file as $k => $value) {
                    $audio = Certificate::find($value);
                    @unlink(public_path('upload/certificates/' . $audio->certificates_file));
                    $audio->delete();
                }
            }

            DB::commit();
            return redirect()->route('frontend.manage_consultant_student')->with('success', 'Student Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function studentDetailsBlank()
    {
        return view('user.consultants.blank_page');
    }


    public function applicationStatus(Request $request, $id)
    {
        $a_status = StudentApplication::find($id);
        $a_status->status = $request->status;
        $a_status->save();

        //Notification Start
        if ($request->status == '1') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Processing';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Processing';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Processing';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '2') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Approved';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Approved';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Approved';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '3') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Cancel';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Cancel';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Cancel';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '4') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Not Submitted';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Not Submitted';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Not Submitted';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '5') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Submitted';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Submitted';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Submitted';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '6') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Pending';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Pending';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Pending';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '7') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is E-documents Qualified';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is E-documents Qualified';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is E-documents Qualified';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '8') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Waiting Processing';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Waiting Processing';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application#' . $a_status->id . ' is Waiting Processing';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '9') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Processing';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Processing';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Processing';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '10') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is More Documents Needed';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is More Documents Needed';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is More Documents Needed';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '11') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Re-Submitted';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Re-Submitted';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Re-Submitted';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '12') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Rejected';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Rejected';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Rejected';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '13') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Transferred';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Transferred';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Transferred';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '14') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Accepted';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Accepted';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Accepted';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '15') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is E-offer Delivered';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is E-offer Delivered';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is E-offer Delivered';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        } elseif ($request->status == '16') {
            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $a_status->id;
                $notification->text = 'Application #' . $a_status->id . ' is Offer Delivered';
                $notification->user_id = $admin->id;
                $notification->type = 'university';
                $notification->save();
            }

            $consultant = auth()->user();
            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Application #' . $a_status->id . ' is Offer Delivered';
            $notification->user_id = $consultant->id;
            $notification->type = 'university';
            $notification->save();


            $notification = new Notification();
            $notification->relation_id = $a_status->id;
            $notification->text = 'Your Application #' . $a_status->id . ' is Offer Delivered';
            $notification->user_id = $a_status->user_id;
            $notification->type = 'university';
            $notification->save();
        }
        //Notification  End
        return redirect()->back()->with('success', 'Application Status Update Successfully!');
    }
    //continent manage student end






    public function edit($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        $data['countries'] = Country::all();

        // return view('user.consultants.student_appliction.edit_personal_info', $data);
        return view('User-Backend.partner_application_manage.edit_personal_info', $data);
    }
    public function update(Request $request, $id)
    {
        try {
            $edit_app = StudentApplication::find($id);
            $edit_app->first_name = $request->first_name;
            $edit_app->middle_name = $request->middle_name;
            $edit_app->last_name = $request->last_name;
            $edit_app->chinese_name = $request->chinese_name ?? '';
            $edit_app->phone = $request->phone;
            $edit_app->email = $request->email;
            $edit_app->dob = $request->dob;
            $edit_app->birth_place = $request->birth_place;
            $edit_app->passport_number = $request->passport_number;
            $edit_app->passport_exipre_date = $request->passport_exipre_date;
            $edit_app->nationality = $request->nationality;
            $edit_app->religion = $request->religion;
            $edit_app->gender = $request->gender;
            $edit_app->maritial_status = $request->maritial_status;
            $edit_app->in_chaina = $request->in_chaina ?? '';
            $edit_app->in_alcoholic = $request->in_alcoholic;
            $edit_app->hobby = $request->hobby;
            $edit_app->native_language = $request->native_language;
            $edit_app->english_level = $request->english_level;
            $edit_app->chinese_level = $request->chinese_level ?? '';
            $edit_app->home_country = $request->home_country;
            $edit_app->home_city = $request->home_city;
            $edit_app->home_district = $request->home_district;
            $edit_app->home_street = $request->home_street;
            $edit_app->home_zipcode = $request->home_zipcode;
            $edit_app->home_contact_name = $request->home_contact_name;
            $edit_app->home_contact_phone = $request->home_contact_phone;
            $edit_app->current_country = $request->current_country;
            $edit_app->current_city = $request->current_city;
            $edit_app->current_district = $request->current_district;
            $edit_app->current_street = $request->current_street;
            $edit_app->current_zipcode = $request->current_zipcode;
            $edit_app->current_contact_name = $request->current_contact_name;
            $edit_app->current_contact_phone = $request->current_contact_phone;
            $edit_app->update();

            if ($request->old_school) {
                foreach ($request->old_school as $k => $value) {
                    // dd($k);
                    $education = ApplicationEducation::find($k);
                    // dd($education);
                    if ($education) {
                        $education->application_id = $edit_app->id;
                        $education->school = $value;
                        $education->major = $request->old_major[$k];
                        $education->start_date = $request->old_start_date[$k];
                        $education->end_date = $request->old_end_date[$k];
                        $education->gpa_type = $request->old_gpa_type[$k];
                        // dd($education);
                        $education->update();
                    }
                }
            }

            if ($request->company) {
                foreach ($request->company as $k => $value) {
                    // dd($k);
                    $work_experience = ApplicationWork::find($k);
                    // dd($education);
                    if ($work_experience) {
                        $work_experience->application_id = $edit_app->id;
                        $work_experience->company = $value;
                        $work_experience->job_title = $request->job_title[$k];
                        $work_experience->start_date = $request->start_date[$k];
                        $work_experience->end_date = $request->end_date[$k];
                        // dd($work_experience);
                        $work_experience->update();
                    }
                }
            }

            return redirect()->back()->with('success', 'Information Updated Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function editFamily($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        // return view('user.consultants.student_appliction.edit_family_info', $data);
        return view('User-Backend.partner_application_manage.edit_family_info', $data);
    }
    public function familyUpdate(Request $request, $id)
    {
        try {
            $edit_app = StudentApplication::find($id);
            $edit_app->father_name = $request->father_name;
            $edit_app->father_nationlity = $request->father_nationlity;
            $edit_app->father_phone = $request->father_phone;
            $edit_app->father_email = $request->father_email;
            $edit_app->father_workplace = $request->father_workplace;
            $edit_app->father_position = $request->father_position;
            $edit_app->mother_name = $request->mother_name;
            $edit_app->mother_nationlity = $request->mother_nationlity;
            $edit_app->mother_phone = $request->mother_phone;
            $edit_app->mother_email = $request->mother_email;
            $edit_app->mother_workplace = $request->mother_workplace;
            $edit_app->mother_position = $request->mother_position;
            $edit_app->guarantor_relationship = $request->guarantor_relationship;
            $edit_app->guarantor_name = $request->guarantor_name;
            $edit_app->guarantor_address = $request->guarantor_address;
            $edit_app->guarantor_phone = $request->guarantor_phone;
            $edit_app->guarantor_email = $request->guarantor_email;
            $edit_app->guarantor_workplace = $request->guarantor_workplace;
            $edit_app->guarantor_work_address = $request->guarantor_work_address;
            $edit_app->study_fund = $request->study_fund;
            $edit_app->emergency_contact_name = $request->emergency_contact_name;
            $edit_app->emergency_contact_phone = $request->emergency_contact_phone;
            $edit_app->emergency_contact_email = $request->emergency_contact_email;
            $edit_app->emergency_contact_address = $request->emergency_contact_address;
            $edit_app->update();
            return redirect()->back()->with('success', 'Information update successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function editProgramInfo($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        // return view('user.consultants.student_appliction.edit_program_info', $data);

        return view('User-Backend.partner_application_manage.edit_program_info', $data);
    }
    public function updateProgramInfo(Request $request, $id)
    {
        try {
            $s_appliction = StudentApplication::find($id);
            $s_appliction->status = $request->status;
            $s_appliction->payment_status = $request->payment_status;
            $s_appliction->save();

            $status = ['Not Complete', 'Processing', 'Approved', 'Cancel', 'Not Submitted', 'Submitted', 'Pending', 'E-documents Qualified', 'Waiting Processing', 'Processing', 'More Documents Needed', 'Re-Submitted', 'Rejected', 'Transferred', 'Accepted', 'E-offer Delivered', 'Offer Delivered'];

            $notification = new Notification();
            $notification->relation_id = $s_appliction->id;
            $notification->text = 'Application Status Has Changed To \'' . $status[$request->status] . '\'.';
            $notification->partner_id = auth()->user()->id;
            $notification->user_id = $s_appliction->user_id;
            $notification->type = 'university';
            $notification->save();

            return redirect()->back()->with('success', 'Status Changed Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function editDocument($id)
    {
        $data['s_appliction'] = StudentApplication::find($id);
        // return view('user.consultants.student_appliction.edit_document_info', $data);
        return view('User-Backend.partner_application_manage.edit_document_info', $data);
    }
    public function updateDocument(Request $request, $id)
    {
        try {
            $s_appliction = StudentApplication::find($id);

            if ($request->old_document_file) {
                foreach ($request->file('old_document_file') as $k => $value) {
                    $document = ApplicationDocument::find($k);
                    @unlink(public_path('upload/application/' . $s_appliction->id . $document->document_file));
                    $document->application_id = $s_appliction->id;
                    $filename = time() . $k . '_document_file' . '.' . $value->getClientOriginalExtension();
                    $value->move(public_path('upload/application/' . $s_appliction->id), $filename);
                    $document->document_file = $filename;
                    $document->extensions = $value->getClientOriginalExtension();

                    $document->save();
                }
            }
            return redirect()->back()->with('success', 'Documents updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function delete(Request $request)
    {
        try {
            $s_applictions = StudentApplication::find($request->s_appliction_id);

            foreach ($s_applictions->carts as $cart) {
                $cart->delete();
            }
            foreach ($s_applictions->educations as $education) {
                $education->delete();
            }
            foreach ($s_applictions->work_experiences as $work_experience) {
                $work_experience->delete();
            }
            foreach ($s_applictions->documents as $document) {
                @unlink(public_path('upload/application/{$request->s_appliction_id}/' . $document->document_file));
                $document->delete();
            }
            foreach ($s_applictions->notifications as $notification) {
                $notification->delete();
            }
            $s_applictions->delete();
            return redirect()->back()->with('success', 'Student Appliction Deleted Successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}