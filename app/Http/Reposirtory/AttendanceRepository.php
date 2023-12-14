<?php

namespace App\Http\Reposirtory;

use App\Http\Interfaces\AttednacneRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Traits\FlashMessageTrait;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;
use App\Models\Attendance;

class AttendanceRepository implements AttednacneRepositoryInterface
{

    use FlashMessageTrait;
    public function index(){
        $students = Student::with("attendance")->get();
     //   return $students;
        return view("attendance.index")->with(['students' => $students]);
    }
    public function destroy(Request $request){

    }
    public function store(Request $request){


        try {
            foreach ($request->id as $id) {
                $attendance = "attendance$id";

                $status = $request->$attendance == "true" ? true : false;
                
                Attendance::updateOrCreate(
                    ['attendance_date' => date('Y-m-d') , 'student_id' => $id ] ,
                    [

                        'attendance_status' => $status
                    ]
                    );
                // if success
            }
            $this->SuccessMsg("attendance creared ");
            return redirect()->route('attendance.index');
        } catch (\Exception $e) {


            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function update(Request $request){

    }
}
