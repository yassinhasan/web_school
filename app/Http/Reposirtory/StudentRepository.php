<?php

namespace App\Http\Reposirtory;

use App\Http\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Traits\FlashMessageTrait;
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
class StudentRepository implements StudentRepositoryInterface
{

    use FlashMessageTrait;
    public function index(){
        $students = DB::table('students')->paginate(100);
        return view("dashboard.pages.students")->with('students',$students);
    }
    public function destroy(Request $request){
        try {

            $multiple_id = $request->multiple_id;
            if($multiple_id != null)
            {
                $deletedId = explode(",",$multiple_id);
                Student::whereIn('id', $deletedId)->delete();
            }
            else{

                Student::findOrFail($request->id)->delete();
            }

            // toastr()->success('Student has been deleted successfully!');
            session()->flash('status', 'success');
            session()->flash('msg', 'Student has been deleted successfully!');
            session()->flash('icon', 'fa-check');
            return redirect()->back();

        } catch(\Exception $e) {
            report($e);
        }
    }
    public function add(Request $request)
    {
        try {
            // Form validation
            $validated=  Validator::make($request->all(),[
                'first_name' => 'required|string|min:3',
                'last_name' => 'required|string|min:3',
                // 'email' => 'required|email',
                // 'phone' => 'required|max:10',
                'age' => 'required|numeric',
                'gender' => 'required',
                'about' => 'nullable|string',
                'country' => 'required|string|min:3',
                'image' => 'file|mimes:jpg,jpeg,png,gif'
             ]);
             if ($validated->stopOnFirstFailure()->fails()) {
                return response()->json([
                    'error' => $validated->errors()->first()
                ]);   
            }
             $student = new Student();
             $student->first_name = $request->first_name;
             $student->last_name = $request->last_name;
             $student->age = $request->age;
            //  $student->email = $request->email;
            //  $student->phone = $request->phone;
             $student->country = $request->country;
             $student->about = $request->about;
             if($request->image)
             {
                 $originalName = $request->image->getClientOriginalName();
                 $savedImage= time() . '_'.$originalName;
                 $student->image= $savedImage;
                
                 $request->image->move(public_path('images/profile/students/'), $savedImage);

             }

            //  Store data in database
            $student->save();
            
            //save in parent table id of logged user and id of last added student
            $parentId = auth()->user()->id;
            $studentId = $student->id;

            ParentModel::create([
                "student_id" => $studentId , 
                "user_id"   => $parentId
            ]);
 
           //  Send mail to admin
            // Mail::to("figo781@gmail.com")->send(new MailContact($request->all()));
            
            return response()->json([
                'success' => 'Student Added Successfully'
            ]);    
        }
        catch(Exception $e)
        {
            return  response()->json([
                'error' => $e->getMessage()
    
            ]);
        }
    }
    public function store(StoreStudentRequest $request){
        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->age = $request->age;
        $student->country = $request->country;
        $student->about = $request->about;
        $websites = [$request->website1 , $request->website2];
        $student->website = json_encode($websites);
        if($request->image !=null)
        {
            $originalName = $request->image->getClientOriginalName();
            $savedImage= time() . '_'.$originalName;
            $student->image= $savedImage;
           
            $request->image->move(public_path('images/profile/students/'), $savedImage);        }
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
                    $student->first_name = $request->first_name,
                    $student->last_name = $request->last_name,
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
                    $student->first_name = $request->first_name,
                    $student->last_name = $request->last_name,
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
