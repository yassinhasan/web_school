<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;

use Exception;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $students = Student::all();
        return view("students.students-show")->with('students',$students);
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
     * Store a newly created resource in storage.
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
        $originalName = $request->image->getClientOriginalName();
        $student->image= $originalName;
        $request->image->move(public_path('images/profile/'), $originalName);
        $student->save();
        toastr()->success('Data has been saved successfully!');

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
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
            $student->update([
                $student->first_name = $request->first_name,
                $student->last_name = $request->last_name,
                $student->age = $request->age,
                $student->country = $request->country,
                $student->about = $request->about,
                $websites = [$request->website1 , $request->website2],
                $student->website = json_encode($websites),
                $originalName = $request->image->getClientOriginalName(),
                $student->image= $originalName,
            ]);
            $request->image->move(public_path('images/profile/'), $originalName);

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


        toastr()->success('Student has been updated successfully!');
        return redirect()->route('student.index');

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

            Student::findOrFail($request->id)->delete();

            toastr()->success('Student has been deleted successfully!');
            return redirect()->route('student.index');

        } catch(\Exception $e) {
            report($e);
        }
    }
}
