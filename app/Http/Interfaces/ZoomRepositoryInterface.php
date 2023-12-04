<?php 
namespace App\Http\Interfaces;

use App\Models\OnlineCourse;
use Illuminate\Http\Request;
interface ZoomRepositoryInterface {
    public function getAllMeetings();
    public function deleteById(Request $request);
    public function createZoom(Request $request);
    public function update(Request $request);

}