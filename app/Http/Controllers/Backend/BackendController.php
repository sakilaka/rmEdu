<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Client;
use App\Models\Course;
use App\Models\Ebook;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Package;
use App\Models\University;
use App\Models\Review;
use App\Models\ServiceBooking;
use App\Models\StudentApplication;
use App\Models\Subscriber;
use App\Models\Testimonial;
use App\Models\User;
use Carbon\Carbon;
use App\Models\VisitorModel;

class BackendController extends Controller
{
  /**
   * Admin Dashboard
   */
  public function index() 
{
    $today = [];
    $week = [];
    $month = [];
    $year = [];

    // Today
    $today['total_visitor'] = VisitorModel::whereDate('created_at', Carbon::today())->count();
    $today['total_application'] = StudentApplication::whereDate('created_at', Carbon::today())->where('status', '!=', 0)->count();
    $today['total_applicants'] = StudentApplication::whereDate('created_at', Carbon::today())->where('status', '!=', 0)->distinct('user_id')->count();
    $today['total_general_course'] = Course::whereDate('created_at', Carbon::today())->count();
    $today['total_consultant'] = User::whereDate('created_at', Carbon::today())->where('type', 7)->count();
    $today['total_event'] = Event::whereDate('created_at', Carbon::today())->count();
    $today['total_blog'] = Blog::whereDate('created_at', Carbon::today())->count();
    $today['total_subscriber'] = Subscriber::whereDate('created_at', Carbon::today())->count();
    $today['total_testimonial'] = Testimonial::whereDate('created_at', Carbon::today())->count();
    $today['total_review'] = Review::whereDate('created_at', Carbon::today())->count();
    $today['total_university'] = University::whereDate('created_at', Carbon::today())->count();
    $today['total_media_partner'] = Client::whereDate('created_at', Carbon::today())->count();

    // This week (Monday to Sunday)
    $week['total_visitor'] = VisitorModel::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_application'] = StudentApplication::where('status', '!=', 0)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_applicants'] = StudentApplication::where('status', '!=', 0)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->distinct('user_id')->count();
    $week['total_general_course'] = Course::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_consultant'] = User::where('type', 7)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_event'] = Event::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_blog'] = Blog::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_subscriber'] = Subscriber::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_testimonial'] = Testimonial::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_review'] = Review::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_university'] = University::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
    $week['total_media_partner'] = Client::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

    // Last 30 days (Instead of current month)
    $month['total_visitor'] = VisitorModel::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_application'] = StudentApplication::where('status', '!=', 0)->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_applicants'] = StudentApplication::where('status', '!=', 0)->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->distinct('user_id')->count();
    $month['total_general_course'] = Course::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_consultant'] = User::where('type', 7)->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_event'] = Event::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_blog'] = Blog::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_subscriber'] = Subscriber::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_testimonial'] = Testimonial::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_review'] = Review::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_university'] = University::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();
    $month['total_media_partner'] = Client::whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])->count();

    // Last 365 days instead of the current year
    $year['total_visitor'] = VisitorModel::whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_application'] = StudentApplication::where('status', '!=', 0)->whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_applicants'] = StudentApplication::where('status', '!=', 0)->whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->distinct('user_id')->count();
    $year['total_general_course'] = Course::whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_consultant'] = User::where('type', 7)->whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_event'] = Event::whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_blog'] = Blog::whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_subscriber'] = Subscriber::whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_testimonial'] = Testimonial::whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_review'] = Review::whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_university'] = University::whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();
    $year['total_media_partner'] = Client::whereBetween('created_at', [Carbon::now()->subDays(365), Carbon::now()])->count();

    return view('Backend.index', compact('today', 'week', 'month', 'year'));
}


}