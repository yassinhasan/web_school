<?php

namespace App\Http\Reposirtory;

use App\Http\Interfaces\AttednacneRepositoryInterface;
use App\Http\Requests\AttendanceSearchRequest;
use Illuminate\Http\Request;
use App\Http\Traits\FlashMessageTrait;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;
use App\Models\Attendance;
use Exception;


class AttendanceRepository implements AttednacneRepositoryInterface
{

    use FlashMessageTrait;
    public function index(){
       // $students = Student::with("attendance")->get();
       $students =   Student::query()
        ->with(['attendance' => function ($query) {
            return $query->where('attendance_date', '=', date('Y-m-d') );
        }])
        ->get();
        return view("dashboard.pages.attendance")->with(['students' => $students]);
    }
    public function report(Request $request){

       $students_form =   Student::all();
       return view("dashboard.pages.report")->with(['students_form' => $students_form]);
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
    public function search(AttendanceSearchRequest $request){
        
        $students_form =   Student::all();
        $from =date('Y-m-d', strtotime($request->from));
        $to =date('Y-m-d', strtotime($request->to)); 
        $students_form =   Student::all();
        try{
            //  if select all students
            if($request->student_id == "all"){
                $students =   Student::query()
                ->with('attendance')->whereHas('attendance' ,function ($query) use ($from ,$to){
                   
                    return $query->whereBetween('attendance_date', [$from, $to]);
                })
                
                ->get();
            }else{
            
         
                $students =   Student::where('id',$request->input('student_id'))
                ->with('attendance')->whereHas('attendance' ,function ($query) use ($from ,$to){
                   
                    return $query->whereBetween('attendance_date', [$from, $to]);
                })
                ->get();
            }
            return view("dashboard.pages.report")->with(['students_form' => $students_form ,'students' => $students]);  
        }catch(Exception $e){
            
            return redirect()->route('attendance.report')->with(['error' => $e->getMessage()]);
        }
    }
    public function update(Request $request){

    }
}
