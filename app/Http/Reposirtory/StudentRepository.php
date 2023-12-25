<?php

namespace App\Http\Reposirtory;

use App\Http\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;
use App\Models\Attendance;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\ParentModel;
use Exception;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\FlashMessageTrait;
use Illuminate\Support\Facades\Hash;
class StudentRepository implements StudentRepositoryInterface
{

    use FlashMessageTrait;
    public function index(){
        $students = DB::table('students')->paginate(100);
        return view("dashboard.pages.students")->with('students',$students);
    }
    public function destroy(Request $request){
        try {
           Student::findOrFail($request->id)->delete();
            // toastr()->success('Student has been deleted successfully!');
            $this->SuccessMsg('Student has been deleted successfully!');
            return redirect()->back();

        } catch(\Exception $e) {
            report($e);
        }
    }
 
    public function store(StoreStudentRequest $request){
        $password = rand_password();
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->country = $request->country;
        $student->about = $request->about;
        $websites = [$request->website1 , $request->website2];
        $student->website = json_encode($websites);
        $student->password = Hash::make($password);
        $student->clear_password = $password ;
        if($request->image !=null)
        {
            $originalName = $request->image->getClientOriginalName();
            $savedImage= time() . '_'.$originalName;
            $student->image= $savedImage;
           
            $request->image->move(public_path('images/profile/students/'), $savedImage);
        }
        $student->save();
        // toastr()->success('Data has been saved successfully!');

        $this->SuccessMsg("Student has been added successfully!!");
        return redirect()->back();
    }
    public function update(UpdateStudentRequest $request, Student $student){
        try{
  
            $student = Student::findOrFail($request->id);
            if($request->image != null)
                {
                    $originalName = $request->image->getClientOriginalName();
                    $savedImage= time() . '_'.$originalName;
                    $student->update([
                    $student->name = $request->name,
                    $student->email = $request->email,
                    $student->age = $request->age,
                    $student->country = $request->country,
                    $student->about = $request->about,
                    $websites = [$request->website1 , $request->website2],
                    $student->website = json_encode($websites),
                    $originalName = $request->image->getClientOriginalName(),
                    $student->image= $savedImage            ]);
                   $request->image->move(public_path('images/profile/students/'), $savedImage);
    
    
            }else{
                $student->update([
                    $student->name = $request->name,
                    $student->email = $request->email,
                    $student->age = $request->age,
                    $student->country = $request->country,
                    $student->about = $request->about,
                    $websites = [$request->website1 , $request->website2],
                    $student->website = json_encode($websites),
                    ]);
            }
    
    
            // toastr()->success('Student has been updated successfully!');
            $this->SuccessMsg("Student has been updated successfully!");
            return redirect()->back();
    
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
    }
}
