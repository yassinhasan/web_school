<?php

namespace App\Http\Traits;
trait FlashMessageTrait {

    public function SuccessMsg($msg="Operation done successfullY")
    {
   
        session()->flash('status', 'success');
        session()->flash('msg', $msg);
        session()->flash('icon', 'fa-check');
    }
    public function ErrorMsg($msg = "Soory somthing error happened.")
    {
       ;
        session()->flash('status', 'error');
        session()->flash('msg', $msg);
        session()->flash('icon','fa-xmark');
    }
} 