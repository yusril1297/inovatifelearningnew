<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'name',
        'course_id',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
