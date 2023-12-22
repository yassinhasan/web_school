<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $guard = 'students';
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'clear_password',
        'code' ,
        'expire_at',
        'age' ,
        'website' ,
        'country',
        'aboute',
        'image' ,

    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = true;
    protected $table = "students";

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'student_id','id');
    }

}
