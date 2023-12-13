<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AttednacneRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Student;
class AttendanceController extends Controller
{
    public AttednacneRepositoryInterface $attendance;
    public function __construct(AttednacneRepositoryInterface $attendance)
    {
        $this->attendance = $attendance;
    }
    public function index()
    {
        $students = Student::with("attendance")->get();
        return view("attendance.index")->with(['students' => $students]);
    }
}
