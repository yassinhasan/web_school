<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model 
{

    protected $table = 'parents';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'student_id',
        'user_id'
    ];


    public function users(){
        return $this->belongsToMany(User::class, 'parents','user_id');
    }
    public function students(){
        return $this->belongsToMany(Student::class, 'parents','student_id');
    }
}