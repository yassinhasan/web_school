<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function sections(){
        return $this->belongsTo(Section::class,"section_id");
    }
    
    protected $fillable = ['id','title','content','section_id'];


}
