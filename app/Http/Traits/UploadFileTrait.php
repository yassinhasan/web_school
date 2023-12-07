<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFileTrait
{
    public function uploadFile($request,$name,$folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs($folder.'/',$file_name,'attachment');

    }

    public function deleteFile($filename,$folder)
    {
       
        $exists = Storage::disk('attachment')->exists($folder.'/'.$filename);

        if($exists)
        {
            Storage::disk('attachment')->delete($folder.'/'.$filename);
        }
    }
}