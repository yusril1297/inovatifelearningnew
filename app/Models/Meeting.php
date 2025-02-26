<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'meeting_time',
    ];

    // Relasi ke model Course (many-to-one)
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
