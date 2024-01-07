<?php

namespace App\Http\Controllers\Auth\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Interfaces\StudentRepositoryInterface;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Http\Requests\Auth\StudentLoginRequest;
use App\Http\Traits\FlashMessageTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{

    public StudentRepositoryInterface $Studentrep;
    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Studentrep = $Student;
    }

    // dashboard
    // show my student of logged user in dashboard
    public function index()
    {
        return $this->Studentrep->index();
    }
       // add student in dashboard
       public function store(StoreStudentRequest $request)
       {
           return $this->Studentrep->store($request );
       }
    // add update in dashboard
    public function update(UpdateStudentRequest $request, Student $student)
    {
        return $this->Studentrep->update($request, $student);
    }

    // add delete in dashboard
    public function destroy(Request $request)
    {

        return $this->Studentrep->destroy($request);
    }

    

 
}
