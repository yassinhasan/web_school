<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    public $fillable = ['name'];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'section_id');
    }
    /**
 * Get the route key for the model.
 *
 * @return string
 */
public function getRouteKeyName()
{
    return 'slug';
}
}
