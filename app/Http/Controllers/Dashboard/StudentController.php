<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\ParentModel;
use App\Http\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{

    public StudentRepositoryInterface $Studentrep;
    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Studentrep = $Student;
    }
    // show my student of logged user
    public function index()
    {
        return $this->Studentrep->index( );
    }


    public function store(StoreStudentRequest $request)
    {
        return $this->Studentrep->store($request );
    }

    public function show(Student $student)
    {
        return view("home.addstudent");
    }

    public function edit(Student $student)
    {
        
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        return $this->Studentrep->update($request , $student);

    }

    public function destroy(Request $request)
    {

        return $this->Studentrep->destroy($request);
    }

    // add student in home by post method by parents only not guest not admin
    public function add(Request $request)
    {
        return $this->Studentrep->add($request);

    }
}
