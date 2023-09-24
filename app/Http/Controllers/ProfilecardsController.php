<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilecardsController extends Controller
{
    public function index(){
        $students = DB::table('students')->paginate(8);
        
        return view("home.profile")->with('students',$students);

    }
}
