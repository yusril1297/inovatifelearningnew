<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'enrollment_id',
        'order_id',
        'amount',
        'payment_method',
        'status',
        'payment_date',
        'payment_details',
        'transaction_id',
    ];

    protected $casts = [
        'payment_details' => 'array',
        'payment_date' => 'datetime',

    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class, 'enrollment_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'enrollment_id');
    }
}
