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
    // show my student of logged user
    public function index()
    {
        return $this->Studentrep->index();
    }

    public function store(StudentLoginRequest $request): RedirectResponse
    {
        try {

            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::DASHBOARD);
        } catch (\Exception $e) {
            $this->ErrorMsg($e->getMessage());
            return redirect('login');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/student/login');
    }


    // public function store(StoreStudentRequest $request)
    // {
    //     return $this->Studentrep->store($request );
    // }

    public function show(Student $student)
    {
        return view("home.addstudent");
    }

    public function edit(Student $student)
    {
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        return $this->Studentrep->update($request, $student);
    }

    // public function destroy(Request $request)
    // {

    //     return $this->Studentrep->destroy($request);
    // }

    // add student in home by post method by parents only not guest not admin
    public function add(Request $request)
    {
        return $this->Studentrep->add($request);
    }
}
