<?php

namespace App\Http\Controllers\Backend\Landing;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\LandingPageForm;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $data['pages'] = LandingPage::orderBy('title', 'asc')->get();
        return view('Backend.landing_pages.index', $data);
    }

    public function create()
    {
        return view('Backend.landing_pages.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => ['max:255']
            ]);

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'form_show' => $request->form_show == 'on' ? 'on' : '',
                'status' => 1,
            ];
            LandingPage::create($data);

            return redirect(route('admin.landing_page.index'))->with('success', 'Landing Page Created Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function edit($id)
    {
        $data['page'] = $page = LandingPage::find($id);

        if (!$page) {
            return redirect()->back()->with('error', 'Page Not Found!');
        }

        return view('Backend.landing_pages.edit', $data);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => ['max:255']
            ]);

            $page = LandingPage::find($id);

            $data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'form_show' => $request->form_show == 'on' ? 'on' : '',
            ];
            $page->update($data);

            return redirect(route('admin.landing_page.index'))->with('success', 'Landing Page Updated Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function delete(Request $request)
    {
        $page = LandingPage::find($request->page_id);
        $page->delete();

        return redirect()->back()->with('success', 'Page Deleted Successfully');
    }

    public function change_status($id)
    {
        $page = LandingPage::find($id);
        if ($page->status == 0) {
            $page->status = 1;
        } elseif ($page->status == 1) {
            $page->status = 0;
        }
        $page->update();
        return redirect()->back()->with('success', 'Status Changed Successfully');
    }

    public function submitted_form_data()
    {
        $data['forms'] = LandingPageForm::latest()->get();
        return view('Backend.landing_pages.form-data', $data);
    }

    public function submitted_form_data_delete(Request $request)
    {
        $form = LandingPageForm::find($request->form_id);
        $form->delete();

        return redirect()->back()->with('success', 'Form Data Deleted Successfully');
    }

    public function get_form_data(Request $request)
    {
        $form_id = $request->form_id;

        $form = LandingPageForm::find($form_id);
        if (!$form) {
            return response([
                'data' => '',
                'message' => 'Form Data Not Found!'
            ]);
        } else {
            return response([
                'data' => $form,
                'message' => 'Success'
            ]);
        }
    }

    public function show_page($slug)
    {
        $data['page'] = $page = LandingPage::where('slug', $slug)->first();

        if (!$page) {
            abort(404, 'Sorry, Page Not Found!');
        } elseif ($page->status == 0) {
            abort(403, 'Sorry, Page is currently inactive!');
        }

        return view('Backend.landing_pages.show_page', $data);
    }

    public function landing_form_submit(Request $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'contact' => $request->contact,
                'education' => $request->education,
                'message' => $request->message,
            ];

            $form = LandingPageForm::create($data);

            $admins = User::where('type', 0)->get();
            foreach ($admins as $admin) {
                $notification = new Notification();
                $notification->relation_id = $form->id;
                $notification->text = 'A new form has been submitted from landing page.';
                $notification->user_id = $admin->id;
                $notification->type = 'form';
                $notification->save();
            }

            return redirect()->back()->with('success', 'Form Submitted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }
}
