<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image1',
        'image2',
        'image3',
        'image4',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
