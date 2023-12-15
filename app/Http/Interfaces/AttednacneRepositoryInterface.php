<?php 
namespace App\Http\Interfaces;

use App\Http\Requests\AttendanceSearchRequest;
use Illuminate\Http\Request;
interface AttednacneRepositoryInterface {
    public function index();
    public function report(Request $request);
    public function store(Request $request);
    public function search(AttendanceSearchRequest $request);
    public function update(Request $request);

}