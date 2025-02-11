<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdf extends Model
{
    use HasFactory;

    protected $fillable = ['pdf', 'pdf_url'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
