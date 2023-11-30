<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    use ApiResponseTrait;
    public function index()
    {
        $students = Student::all();
        if ($students) {
            $students =  StudentResource::collection($students);
            return $this->ApiResponse($students, "ok", 200);
        }

        return $this->ApiResponse($students, "problem in returing data", 200);
    }

    // get student by id

    public function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            $students = new StudentResource($student);
            return $this->ApiResponse($students, "ok", 200);
        }


        return $this->ApiResponse($student, "student not found", 400);
    }

    // store student
    public function store(Request $request)
    {
        $validated =  Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'about' => 'required'
        ]);
        if ($validated->fails()) {

            return $this->ApiResponse($validated->errors(), "student not saved", 400);
        }
        $student = new Student();
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->age = $request->age;
        $student->country = $request->country;
        $student->about = $request->about;
        $websites = [$request->website1, $request->website2];
        $student->website = json_encode($websites);
        if ($request->image != null) {
            $originalName = $request->image->getClientOriginalName();
            $savedImage = time() . '_' . $originalName;
            $student->image = $savedImage;

            $request->image->move(public_path('images/profile/students/'), $savedImage);
        }
        $student->save();
        return $this->ApiResponse($student, "saved", 200);
    }
    public function update(Request $request, $id)
    {

        $student = Student::find($request->id);
        if (!$student) {
            return $this->ApiResponse($student, "student not found", 400);
        }
        $validated =  Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
            'about' => 'required'
        ]);
        if ($validated->fails()) {

            return $this->ApiResponse($validated->errors(), "student not saved", 400);
        }
        if ($request->image != null) {
            $originalName = $request->image->getClientOriginalName();
            $savedImage = time() . '_' . $originalName;
            $student->update([
                $student->first_name = $request->first_name,
                $student->last_name = $request->last_name,
                $student->age = $request->age,
                $student->country = $request->country,
                $student->about = $request->about,
                $websites = [$request->website1, $request->website2],
                $student->website = json_encode($websites),
                $originalName = $request->image->getClientOriginalName(),
                $student->image = $savedImage
            ]);
            $request->image->move(public_path('images/profile/students/'), $savedImage);
        } else {
            $student->update([
                $student->first_name = $request->first_name,
                $student->last_name = $request->last_name,
                $student->age = $request->age,
                $student->country = $request->country,
                $student->about = $request->about,
                $websites = [$request->website1, $request->website2],
                $student->website = json_encode($websites),
            ]);
        }
        return $this->ApiResponse($student, "studnet updated", 200);
    }
    public function destroy(Request $request)
    {

        $student = Student::find($request->id);
        if (!$student) {
            return $this->ApiResponse($student, "student not found", 400);
        }
        $name = $student->first_name." " .$student->last_name;
        $student->delete();
        return $this->ApiResponse($student, "$name has been deleted", 200);
    }

}
