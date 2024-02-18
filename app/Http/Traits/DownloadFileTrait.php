<?php
namespace App\Http\Traits;

trait DownloadFileTrait {

    public function ExportExcell(array $headers , array $data , string $filename)
    {

        $excel_data = implode("\t",$headers)."\n";
        foreach($data as $d)
        {
            $excel_data .= implode("\t",$d)."\n";
        }
        $file_name = $filename.date("Y-m-d").".xls";
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=$file_name");  //File name extension was wrong
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        echo $excel_data;   
    }
}


