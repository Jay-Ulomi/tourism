<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planbooking extends Model
{
    protected $table = 'planbooking'; // Specify the table name if different from the model name
    protected $fillable = ['user_id', 'plan_id', 'numberOfPeople', 'totalPrice', 'start_at', 'end_at','booking_status']; // Specify the fillable fields

    // Define the relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
