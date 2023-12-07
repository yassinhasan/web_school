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
    $settings = Setting::where('key','logo_image')->pluck('value');
    return $settings[0];
    
}