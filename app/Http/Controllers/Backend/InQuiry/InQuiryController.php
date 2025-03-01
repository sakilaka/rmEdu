<?php

namespace App\Http\Controllers\Backend\InQuiry;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Inquiry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InQuiryController extends Controller
{
    /**
     * Show Inquiry from in frontend
     */
    public function show_inquiry_form()
    {
        $data['countries'] = Country::where('status', 1)->orderBy('name', 'asc')->get();
        return view('Frontend.pages.inquiry_form', $data);
    }

    /**
     * Store Inquiry form data
     */
    public function store_inquiry_form_data(Request $request, $requested_unique_id = null)
    {
        try {
            /* $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                'email' => 'nullable|email|max:255',
                'phone' => 'required|string|max:15'
            ]);

            if ($validator->fails()) {
                foreach ($validator->errors()->messages() as $fieldErrors) {
                    $errorMessage = reset($fieldErrors);
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
            } */

            // $validatedData = $validator->validated();

            if ($requested_unique_id) {
                $inquiry = Inquiry::where('unique_inquiry_code', $requested_unique_id)->first();
            } else {
                $inquiry = new Inquiry();

                $unique_id = explode('-', uuid_create())[0];
                $inquiry->unique_inquiry_code = $unique_id;
            }

            $inquiry->name = $request['name'];
            $inquiry->date_of_birth = $request['dob'];
            $inquiry->age = Carbon::parse($request['dob'])->age;
            $inquiry->email = $request['email'];
            $inquiry->mobile = $request['phone'];
            $inquiry->applying_degree = $request['degree'];
            $inquiry->subject = $request['subject'];
            $inquiry->country = json_encode($request['country']);
            $inquiry->university = $request['university'];
            $inquiry->education_details = json_encode($request['education']);
            $inquiry->documents = json_encode($request->input('documents'));
            $inquiry->documents_input = json_encode($request->input('documents_input'));
            $inquiry->counselor_name = $request['counselor_name'] ?? null;
            $inquiry->program = $request['program'] ?? null;
            $inquiry->interest = $request['interest'] ?? null;
            $inquiry->budget = $request['budget'] ?? null;
            $inquiry->note = $request['note'] ?? null;
            $inquiry->reference = $request['reference'] ?? null;

            $inquiry->save();

            if ($requested_unique_id) {
                $response = [
                    'success' => 'Inquiry Form Has Been Updated!'
                ];
            } else {
                $response = [
                    'success' => 'Inquiry Form Has Submitted Successfully!',
                    'status' => 'submitted'
                ];
            }
            return redirect()->back()->with($response);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    /**
     * Show all inquiry form data - admin
     */
    public function index(Request $request)
    {
        $query = Inquiry::latest();

        // Apply filters if present
        if ($request->has('country') && $request->input('country') != '' && $request->input('country') != 'all') {
            $query->where('country', $request->input('country'));
        }

        if ($request->has('program') && $request->input('program') != '' && $request->input('program') != 'all') {
            $query->where('program', $request->input('program'));
        }

        if ($request->has('interest') && $request->input('interest') != '' && $request->input('interest') != 'all') {
            $query->where('interest', $request->input('interest'));
        }

        if ($request->has('budget') && $request->input('budget') != '') {
            $query->where('budget', $request->input('budget'));
        }

        $data['inquiries'] = $query->get();
        $data['countries'] = Country::where('status', 1)->orderBy('name', 'asc')->get();
        return view('Backend.inquiry.index', $data);
    }

    /**
     * Edit inquiry form - admin
     */
    public function edit($unique_id)
    {
        $data['inquiry'] = Inquiry::where('unique_inquiry_code', $unique_id)->first();
        $data['countries'] = Country::where('status', 1)->orderBy('name', 'asc')->get();
        return view('Backend.inquiry.edit', $data);
    }

    /**
     * View inquiry form data - admin
     */
    public function view($unique_id)
    {
        $data['inquiry'] = Inquiry::where('unique_inquiry_code', $unique_id)->first();
        return view('Backend.inquiry.view', $data);
    }

    /**
     * Delete inquiry form - admin
     */
    public function delete(Request $request)
    {
        $inquiry = Inquiry::find($request->inquiry_id);

        if ($inquiry) {
            $inquiry->delete();
            return redirect()->back()->with('success', 'Inquiry Form Has Been Deleted!');
        } else {
            return redirect()->back()->with('error', 'Inquiry Form Not Found!');
        }
    }
}
