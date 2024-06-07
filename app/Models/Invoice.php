<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'planbooking_id',
        'invoice_number',
        'invoice_date',
        'amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function planbooking()
    {
        return $this->belongsTo(Planbooking::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
