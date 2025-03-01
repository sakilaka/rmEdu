<?php

namespace App\Http\Controllers\Backend\All_users;

use App\Http\Controllers\Controller;
use App\Models\FounderCoFundere;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FounderCoFundereController extends Controller
{
    public function index()
    {
        $data['founders'] = FounderCoFundere::all();
        return view("Backend.all_users.founder.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data['courses'] = Course::orderBy('id','desc')->get();
        return view("Backend.all_users.founder.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $founder = new FounderCoFundere;
        $founder->name = $request->name;
        $founder->designation = $request->designation;
        $founder->mobile = $request->mobile;
        $founder->email = $request->email;
        $founder->facebook = $request->facebook;
        $founder->twitter = $request->twitter;
        $founder->google_plus = $request->google_plus;
        $founder->linkedin = $request->linkedin;
        $founder->about = $request->about ?? "";

        if ($request->hasFile('image')) {
            $fileName = rand() . time() . '_founder_co_funder.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/founder-co-funder/'), $fileName);
            $founder->image = $fileName;
        }
        $founder->save();

        return redirect()->route('admin.founder.index')->with('success', 'Founder & Co-Funder Add Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // dd('hi');
        $data["founder"] = FounderCoFundere::find($id);
        return view("Backend.all_users.founder.update", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $founder = FounderCoFundere::find($id);
        $founder->name = $request->name;
        $founder->designation = $request->designation;
        $founder->mobile = $request->mobile;
        $founder->email = $request->email;
        $founder->facebook = $request->facebook;
        $founder->twitter = $request->twitter;
        $founder->google_plus = $request->google_plus;
        $founder->linkedin = $request->linkedin;
        $founder->about = $request->about ?? "";


        if ($request->hasFile('image')) {
            @unlink(public_path('upload/founder-co-funder/' . $founder->image));
            $fileName = rand() . time() . '_founder_co_funder.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('upload/founder-co-funder/'), $fileName);
            $founder->image = $fileName;
        }
        $founder->save();


        return redirect()->route('admin.founder.index')->with('success', 'Founder & Co-Funder Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $founder =  FounderCoFundere::find($request->founder_id);
            @unlink(public_path('upload/founder-co-funder/' . $founder->image));

            $founder->delete();
            return back()->with('success', 'Founder & Co-Funder Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function status($id)
    {
        try {
            $founder = FounderCoFundere::find($id);
            if ($founder->status == 0) {
                $founder->status = 1;
            } elseif ($founder->status == 1) {
                $founder->status = 0;
            }
            $founder->update();
            return redirect()->back()->with('success', 'Status Update Successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong!');
        }
    }
}
