<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_name',
        'restaurant_image',
        'description',
        'city',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   
}
