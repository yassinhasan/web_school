<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'first_name',
        'last_name' ,
        'age' ,
        'website' ,
        'country',
        'aboute',
        'image' 
    ];
    public $timestamps = true;
    protected $table = "students";

    public function users(){
        return $this->belongsToMany(User::class,"parents");

    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id');
    }

}
