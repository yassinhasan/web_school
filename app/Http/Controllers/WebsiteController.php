<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index()

    {
                // $students = Student::paginate(10)->sortByDesc('points');;
                $students = DB::table('students')->orderBy('points','DESC')->paginate(4);
        
                return view('home.view-website')->with('students',$students);
    }
}
