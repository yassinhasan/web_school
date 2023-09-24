<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\UpdateStudentRequest;
use App\Models\ParentModel;
use App\Models\User;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{


    // show my student of logged user
    public function index()
    {
        $students =  User::with('students')->get()->find(auth()->user()->id);
        return view("students.student")->with('students',$students);
    }
    public function all()
    {
        // $students = Student::all();
        $students = DB::table('students')->orderBy('points','DESC')->paginate(100);

      return view("students.all-students")->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * add student by admin only 
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $validated = $request->validated();
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
            $savedImage= time() . '.'.$originalName;
            $student->image= $savedImage;
           
            $request->image->move(public_path('images/profile/students/'), $savedImage);        }
        $student->save();
        // toastr()->success('Data has been saved successfully!');

        return redirect()->back()->with('status', 'student added ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view("home.addStudent");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        // dd($request->request);
        try{
        $validated = $request->validated();
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
        return redirect()->back()->with('status', 'Student has been updated successfully! ');

        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

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
            return redirect()->back()->with('status', 'Student has been deleted successfully! ');

        } catch(\Exception $e) {
            report($e);
        }
    }



    // add student in home by post method by parents only not guest not admin
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
}
