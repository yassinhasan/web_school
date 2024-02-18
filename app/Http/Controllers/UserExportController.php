<?php

namespace App\Http\Controllers;

use  App\Exports\StudentsExport;
use App\Http\Traits\DownloadFileTrait;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Excel ;

class UserExportController extends Controller
{

    private $excel ;
    public function __construct(Excel  $excel)
    {
      $this->excel =$excel;
    }
    public function export()
    {

        return  $this->excel->download(new StudentsExport,'students.xlsx');
    }


}
