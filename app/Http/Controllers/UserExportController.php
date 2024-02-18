<?php

namespace App\Http\Controllers;

use  App\Exports\StudentsExport;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UserExportController extends Controller
{
    public function export()
    {
        $all_headers =  DB::getSchemaBuilder()->getColumnListing("students");
        $selected_headers = array_diff($all_headers,['provider_refresh_token','provider_token','provider_id','likedby']);
        $excel_data = implode("\t",$selected_headers)."\n";
        $data  =  Student::get()->makeHidden(['provider_refresh_token','provider_token','provider_id','likedby']) ->toArray();
        foreach($data as $d)
        {
            $excel_data .= implode("\t",$d)."\n";
        }
        $file_name = "students".date("Y-m-d").".xls";
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=$file_name");  //File name extension was wrong
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        echo $excel_data;

      // return  Excel::download(new StudentsExport,'test.xlsx');
    }

}
