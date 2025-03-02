<?php

use App\Http\Controllers\Backend\Madical_Tourism\CityController;
use App\Http\Controllers\Backend\Madical_Tourism\ContinentController;
use App\Http\Controllers\Backend\Madical_Tourism\CountryController;
use App\Http\Controllers\Backend\Madical_Tourism\HotelPackageController;
use App\Http\Controllers\Backend\Madical_Tourism\MedicalTourismPackageController;
use App\Http\Controllers\Backend\Madical_Tourism\StateController;
use App\Http\Controllers\Backend\Madical_Tourism\ThanaController;
use App\Http\Controllers\Backend\Madical_Tourism\UnionController;
use App\Http\Controllers\Backend\Madical_Tourism\WordController;
use App\Http\Controllers\Backend\medical_tourism\PopularLocationController;
use App\Http\Controllers\Backend\University\UniversityController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\MedicalTourismController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Backend\Courses\UniversityCourseController;
use App\Http\Controllers\Backend\Courses\DepartmentController;
use App\Http\Controllers\Backend\Courses\DegreeController;
use App\Http\Controllers\Backend\Courses\SectionController;
use App\Http\Controllers\Backend\Courses\CourseLanguageController;
use App\Http\Controllers\Frontend\UniversityController as FrontendUniversityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth:admin', 'adminCheck:0'])->group(function () {

    Route::prefix('university')->group(function () {
        //university
        Route::get('index', [UniversityController::class, "index"])->name('admin.university.index');
        Route::get('create', [UniversityController::class, "create"])->name('admin.university.create');
        Route::post('store', [UniversityController::class, "store"])->name('admin.university.store');
        Route::get('edit/{id}', [UniversityController::class, "edit"])->name('admin.university.edit');
        Route::post('update/{id}', [UniversityController::class, "update"])->name('admin.university.update');
        Route::post('delete', [UniversityController::class, "destroy"])->name('admin.university.delete');
        Route::get('/status/{id}', [UniversityController::class, 'status'])->name('admin.university.status');


        Route::get('university-faq', [UniversityController::class, "universityFAQMAnage"])->name('admin.university_faq_manage'); //backend
        Route::post('university-faq-answer/{id}', [UniversityController::class, "universityFAQanswer"])->name('admin.university_faq_answer'); //backend
        Route::post('university-faq-delete', [UniversityController::class, "universityFAQanswerDelete"])->name('admin.university_faq_answer_delete'); //backend
    });
});



Route::prefix('u_courses')->middleware(['auth:admin', 'adminCheck:0'])->group(function () {
    //Course Create
    Route::get('index', [UniversityCourseController::class, "index"])->name('admin.u_course.index');
    Route::get('create', [UniversityCourseController::class, "create"])->name('admin.u_course.create');
    Route::post('store', [UniversityCourseController::class, "store"])->name('admin.u_course.store');
    Route::get('edit/{id}', [UniversityCourseController::class, "edit"])->name('admin.u_course.edit');
    Route::post('update/{id}', [UniversityCourseController::class, "update"])->name('admin.u_course.update');
    Route::post('delete', [UniversityCourseController::class, "destroy"])->name('admin.u_course.delete');
    Route::get('/status/{id}', [UniversityCourseController::class, 'status'])->name('admin.u_course.status');
});
Route::get('/get/degree/{id}', [UniversityCourseController::class, 'getDegree']);

Route::prefix('department')->middleware(['auth:admin', 'adminCheck:0'])->group(function () {
    //Course Create
    Route::get('index', [DepartmentController::class, "index"])->name('admin.department.index');
    Route::get('create', [DepartmentController::class, "create"])->name('admin.department.create');
    Route::post('store', [DepartmentController::class, "store"])->name('admin.department.store');
    Route::get('edit/{id}', [DepartmentController::class, "edit"])->name('admin.department.edit');
    Route::post('update/{id}', [DepartmentController::class, "update"])->name('admin.department.update');
    Route::post('delete', [DepartmentController::class, "destroy"])->name('admin.department.delete');
    Route::get('/status/{id}', [DepartmentController::class, 'status'])->name('admin.department.status');
});

Route::prefix('degree')->middleware(['auth:admin', 'adminCheck:0'])->group(function () {
    //Course Create
    Route::get('index', [DegreeController::class, "index"])->name('admin.degree.index');
    Route::get('create', [DegreeController::class, "create"])->name('admin.degree.create');
    Route::post('store', [DegreeController::class, "store"])->name('admin.degree.store');
    Route::get('edit/{id}', [DegreeController::class, "edit"])->name('admin.degree.edit');
    Route::post('update/{id}', [DegreeController::class, "update"])->name('admin.degree.update');
    Route::post('delete', [DegreeController::class, "destroy"])->name('admin.degree.delete');
    Route::get('/status/{id}', [DegreeController::class, 'status'])->name('admin.degree.status');
});

Route::prefix('language')->middleware(['auth:admin', 'adminCheck:0'])->group(function () {
    //language Start
    Route::get('index/language', [CourseLanguageController::class, "index"])->name('admin.language.index');
    Route::get('create/language', [CourseLanguageController::class, "create"])->name('admin.language.create');
    Route::post('store/language', [CourseLanguageController::class, "store"])->name('admin.language.store');
    Route::get('edit/language/{id}', [CourseLanguageController::class, "edit"])->name('admin.language.edit');
    Route::post('update/language/{id}', [CourseLanguageController::class, "update"])->name('admin.language.update');
    Route::post('delete/language', [CourseLanguageController::class, "destroy"])->name('admin.language.delete');
    Route::get('/status/{id}', [CourseLanguageController::class, 'status_toggle'])->name('admin.language.status');
    //language Start
});

Route::prefix('section')->middleware(['auth:admin', 'adminCheck:0'])->group(function () {
    //Course Create
    Route::get('index', [SectionController::class, "index"])->name('admin.section.index');
    Route::get('create', [SectionController::class, "create"])->name('admin.section.create');
    Route::post('store', [SectionController::class, "store"])->name('admin.section.store');
    Route::get('edit/{id}', [SectionController::class, "edit"])->name('admin.section.edit');
    Route::post('update/{id}', [SectionController::class, "update"])->name('admin.section.update');
    Route::post('delete', [SectionController::class, "destroy"])->name('admin.section.delete');
    Route::get('/status/{id}', [SectionController::class, 'status'])->name('admin.section.status');
});

Route::get('ajax-university-filter', [FrontendUniversityController::class, "ajaxFilterUniversity"])->name('frontend.ajax-university-filter');

Route::prefix('list')->group(function () {
    Route::get('find-university', [FrontendUniversityController::class, "find_university"])->name('frontend.find_university');
    Route::get('all-universities', [FrontendUniversityController::class, "index"])->name('frontend.all_universities_list');
    Route::get('university-details/{id}', [FrontendUniversityController::class, "universityDetails"])->name('frontend.university_details');
    Route::post('question', [FrontendUniversityController::class, "question"])->name('frontend.question'); //frontend

});