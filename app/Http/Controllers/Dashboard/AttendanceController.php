<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AttednacneRepositoryInterface;
use App\Http\Requests\AttendanceSearchRequest;
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
    public function report(Request $request)  {
        return  $this->Attendance->report($request);
    }
    public function search(AttendanceSearchRequest $request)  {
        return  $this->Attendance->search($request);
    }
}
