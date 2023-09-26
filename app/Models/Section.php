<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    public $fillable = ['name'];

    public function category()
    {
        return $this->belongsTo("categories",'category_id');
    }
}
