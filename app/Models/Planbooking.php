<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planbooking extends Model
{
    protected $table = 'planbooking'; // Specify the table name if different from the model name
    protected $fillable = ['user_id', 'plan_id', 'numberOfPeople', 'totalPrice', 'start_at', 'end_at','booking_status','activities']; // Specify the fillable fields

    protected $casts = [
        'activities' => 'array',
    ];
    
    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
