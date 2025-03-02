<?php

namespace App\Http\Controllers\Backend\University;

use App\Http\Controllers\Controller;
use App\Models\AskQuestion;
use App\Models\City;
use App\Models\Continent;
use App\Models\Country;
use App\Models\CourseLanguage;
use App\Models\Degree;
use App\Models\Department;
use App\Models\Section;
use App\Models\State;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversityController extends Controller
{
    public function index()
    {
        $data['universities'] = University::orderBy('id', 'desc')->get();
        return view("Backend.university.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['continents'] = Continent::all();
        $data['degrees'] = Degree::all();
        $data['departments'] = Department::all();
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        $data['states'] = $states = State::all();
        $data['cities'] = $cities = City::all();
        $data['languages'] = CourseLanguage::all();
        $data['sections'] = $sections = Section::orderBy('id', 'desc')->get();
        return view("Backend.university.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $university = new University();
            $university->name = $request->name;
            $university->continent_id = $request->continent_id;
            $university->country_id = $request->country_id;
            $university->degree_id = implode(',', $request->degree_id);
            $university->department_id = implode(',', $request->department_id);
            $university->section_id = implode(',', $request->section_id);
            $university->language_id = implode(',', $request->language_id);
            // $university->state_id = $request->state_id;
            // $university->city_id = $request->city_id;
            $university->app_deadline = $request->app_deadline;
            $university->next_start_date = $request->next_start_date;
            $university->yearly_tuition = $request->yearly_tuition;
            $university->duration = $request->duration;
            $university->address = $request->address;
            $university->admissions_process = $request->admissions_process;
            $university->accommodation = $request->accommodation;
            $university->scholarships = $request->scholarships;
            $university->overview = $request->overview;
            $university->fees_structure = $request->fees_structure;
            $university->academic_requirements = $request->academic_requirements;
            $university->english_requirements = $request->english_requirements;
            $university->budgets = $request->budgets;

            $stat_values = [
                'rank' => $request->rank,
                'top_rank_percentage' => $request->top_rank_percentage,
                'total_students' => $request->total_students,
                'world_ranking' => $request->world_ranking,
            ];
            $university->stat_values = json_encode($stat_values);

            $location = [];
            if ($request->location) {
                foreach ($request->location as $key => $map) {
                    $location[] = $map;
                }
            }
            $university->location = json_encode($location);

            if ($request->hasFile('image')) {
                $fileName = rand() . time() . '_university_logo.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/university/'), $fileName);
                $university->image = $fileName;
            }
            if ($request->hasFile('banner_image')) {
                $fileName = rand() . time() . '_university_banner_image.' . request()->banner_image->getClientOriginalExtension();
                request()->banner_image->move(public_path('upload/university/'), $fileName);
                $university->banner_image = $fileName;
            }
            $university->save();

            DB::commit();
            return redirect()->route('admin.university.index')->with('success', 'University Added Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
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
        $data["university"] = $university = University::find($id);
        $data['continents'] = Continent::all();
        $data['cities'] = City::where('state_id', @$university->state->id)->get();
        $data['states'] = State::where('country_id', @$university->country->id)->get();
        $data['countries'] = Country::where('continent_id', @$university->continent->id)->get();
        $data["university"] = $university;
        return view("Backend.university.update", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',

        ]);
        try {
            DB::beginTransaction();
            $university = University::find($id);
            $university->name = $request->name;
            $university->continent_id = $request->continent_id;
            $university->country_id = $request->country_id;
            // $university->state_id = $request->state_id;
            // $university->city_id = $request->city_id;
            $university->address = $request->address;
            $university->admissions_process = $request->admissions_process;
            $university->accommodation = $request->accommodation;
            $university->scholarships = $request->scholarships;
            $university->overview = $request->overview;
            $university->fees_structure = $request->fees_structure;
            $university->academic_requirements = $request->academic_requirements;
            $university->english_requirements = $request->english_requirements;
            $university->budgets = $request->budgets;

            $stat_values = [
                'rank' => $request->rank,
                'top_rank_percentage' => $request->top_rank_percentage,
                'total_students' => $request->total_students,
                'world_ranking' => $request->world_ranking,
            ];
            $university->stat_values = json_encode($stat_values);

            $location = [];
            if ($request->location) {
                foreach ($request->location as $key => $map) {
                    $location[] = $map;
                }
            }
            $university->location = json_encode($location);

            if ($request->hasFile('image')) {
                @unlink(public_path('upload/university/' . $university->image));
                $fileName = rand() . time() . 'university_logo.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('upload/university/'), $fileName);
                $university->image = $fileName;
            }
            if ($request->hasFile('banner_image')) {
                @unlink(public_path('upload/university/' . $university->banner_image));
                $fileName = rand() . time() . 'university_banner_image.' . request()->banner_image->getClientOriginalExtension();
                request()->banner_image->move(public_path('upload/university/'), $fileName);
                $university->banner_image = $fileName;
            }
            $university->save();

            DB::commit();
            return redirect()->route('admin.university.index')->with('success', 'University Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $university =  University::find($request->university_id);
            @unlink(public_path('upload/university/' . $university->image));
            @unlink(public_path('upload/university/' . $university->banner_image));
            $university->delete();

            return back()->with('success', 'University Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }



    public function status($id)
    {
        try {
            $university = University::find($id);
            if ($university->status == 0) {
                $university->status = 1;
            } elseif ($university->status == 1) {
                $university->status = 0;
            }
            $university->update();
            return redirect()->route('admin.university.index')->with('success', 'University Status Changed Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function universityFAQMAnage()
    {
        $data['faq_questions'] = AskQuestion::where('type', 'university')->orderBy('id', 'desc')->get();
        return view('Backend.university.faq_question', $data);
    }
    public function universityFAQanswer(Request $request, $id)
    {
        try {
            $ans = AskQuestion::find($id);
            $ans->answer = $request->answer;
            $ans->save();

            return redirect()->back()->with('success', 'Answer added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }
    public function universityFAQanswerDelete(Request $request)
    {
        try {
            $qus = AskQuestion::find($request->university_faq_answer_id);
            $qus->delete();
            return redirect()->back()->with('success', 'University FAQ deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }
}