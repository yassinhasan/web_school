<?php 
namespace App\Http\Interfaces;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\ParentModel;
use Illuminate\Http\Request;
interface StudentRepositoryInterface {
    public function index();
    public function destroy(Request $request);
    // public function add(Request $request);
    public function store(StoreStudentRequest $request);
    public function update(UpdateStudentRequest $request, Student $student);

}