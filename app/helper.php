<?php

use App\Models\Setting;

function prepareIntroText(string $string): string
{
    $lines = explode(",",$string);
    $p ="";
    foreach($lines as $line)
    {
        if($line == "")continue;
        if(str_contains($line,"Made By")){
           $p .= "<p>".$line." <i class='fas fa-heart'></i>"."</p>";
        }
        $p .= "<p>".$line."</p>";
    }
    return $p;
}


function getLogoImage()
{
    $image = Setting::where('key','logo_image')->pluck('value')->first();
    return url('/images/settings/'.$image) ;;
    
}

function rand_password(  ) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,8);

}

function getStudentImage($student)
{
    $path= "";
  
    if(isset($student->provider_id) and  ($student->provider_id != null || $student->provider_id != ""))
    {
        $path .= $student->image;
    }else{
      
        $path .=   url('/images/profile/students/'.$student->image) ;
    }
    
    return $path;
}