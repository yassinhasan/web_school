<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    public $fillable = ['name','image'];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class,'category_id');
    }
}
