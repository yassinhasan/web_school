<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentsExport implements FromCollection ,Responsable , ShouldAutoSize
{
    use Exportable;
    private $fileName = "students.xlsx";
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all();
    }
}
