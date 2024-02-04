<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\OnlineCourse;
use App\Models\Post;
use App\Models\Student;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        
        $data['posts_count'] = Post::all()->count();
        $data['posts_today'] = Post::whereDate('created_at', date('Y-m-d'))->count();
        $data['posts_lastweek'] =Post::whereDate('created_at','>=', Carbon::now()->subDays(7))->count();
        $data['posts_month'] = Post::whereDate('created_at','>=', Carbon::now()->subDays(30))->count();
        $data['students'] = Student::latest()->take(5)->get();
        $data['courses'] = OnlineCourse::latest()->take(4)->get();
        $data['events'] = Event::latest()->take(4)->get();
        $data['categories'] = Category::latest()->take(3)->get();
        $data['height_students'] = Student::orderBy('points','DESC')->take(2)->get();
        return view('dashboard.pages.dashboard')->with('data',$data) ;
    }
}
