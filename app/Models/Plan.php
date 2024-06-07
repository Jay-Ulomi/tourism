<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'description', 'price', 'info'];

    // If you want to cast the 'info' attribute to an array automatically
    protected $casts = [
        'info' => 'array',
    ];

    public function planbooking()
    {
        return $this->hasMany(Planbooking::class);
    }
}
