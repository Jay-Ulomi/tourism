<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_name',
        'price',
        'hotel_image',
        'city',
        'description',
        'category_id',
        'rate',
        'image2',
        'image3',
        'image4',
    ];

    /**
     * Get the category associated with the hotel.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The users that belong to the hotel.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
