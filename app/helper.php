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

function getStudentImage($image)
{
    $path= "";
    if(auth()->user()->provider_id != null || auth()->user()->provider_id != "")
    {
        $path .= $image;
    }else{
        $path .=   url('/images/profile/students/'.$image) ;
    }
    
    return $path;
}