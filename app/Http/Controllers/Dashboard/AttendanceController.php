<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AttednacneRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Student;
class AttendanceController extends Controller
{
    public AttednacneRepositoryInterface $Attendance;
    public function __construct(AttednacneRepositoryInterface $attendance)
    {
        $this->Attendance = $attendance;
    }
    public function index()
    {
      return  $this->Attendance->index();
    }

    public function store(Request $request)  {
        return  $this->Attendance->store($request);
    }
}
