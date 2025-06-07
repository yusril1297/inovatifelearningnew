<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question_text',
        'test_id',
        'answer_a',
        'answer_b',
        'answer_c',
        'answer_d',
        'correct_answer',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
}
