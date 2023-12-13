<?php

namespace App\Http\Reposirtory;

use App\Http\Interfaces\AttednacneRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Traits\FlashMessageTrait;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;

class AttendanceRepository implements AttednacneRepositoryInterface
{

    use FlashMessageTrait;
    public function index(){}
    public function destroy(Request $request){}
    public function store(Request $request){}
    public function update(Request $request){}
}
