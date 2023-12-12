<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
class AttendanceController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view("attendance.index")->with(['students' => $students]);
    }
}
