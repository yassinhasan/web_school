<?php
namespace App\Http\Controllers\Api;
trait ApiResponseTrait {
    public function ApiResponse($data = null , $msg = null , $status = null)
    {
  
         $data = [
            "data" => $data , 
            "msg"  => $msg , 
            "status" => $status
        ];
        return response($data);
    }
}