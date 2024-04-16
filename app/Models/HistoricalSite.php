<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalSite extends Model
{
    use HasFactory;

    protected $fillable = [
        'history_name',
        'history_image',
        'description',
        'price',
        'city',
        'image2',
        'image3',
        'image4',
    ];


}
