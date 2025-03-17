<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'course_id',
        'enrollment_date',
        'payment_method',
        'payable_amount',
        'status',
        'exp_time',
        'is_lifetime',
    ];

    protected $table = 'enrollments';
    protected $primaryKey = 'id'; 

    protected $casts = [
        'enrollment_date' => 'datetime', // Pastikan kolom ini di-cast sebagai datetime
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }
}
