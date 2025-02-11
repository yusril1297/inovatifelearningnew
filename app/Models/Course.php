<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'instructor_id',
        'category_id',
        'level_id',
        'thumbnail',
        'price',
        'youtube_thumbnail_url',
        'status',
    ];

    // Menyimpan slug secara otomatis saat menyimpan course
    public static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            $course->slug = Str::slug($course->title);
        });

        static::updating(function ($course) {
            $course->slug = Str::slug($course->title);
        });
    }

    // Relasi ke model Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke model User (Instructor)
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    // Scope untuk mendapatkan kursus yang dipublikasikan
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope untuk mendapatkan kursus gratis
    public function scopeFree($query)
    {
        return $query->where('price', 0.00);
    }

    // Relasi one-to-many dengan model Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relasi one-to-many dengan model Level
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function pdfs()
    {
        return $this->hasMany(pdf::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'enrollment_id');
    }

    public function enrolledCount()
    {
        return $this->enrollments()->count();
    }

    public function student()
    {
        return $this->hasMany(User::class, 'course_id', 'enrollments', 'user_id');
    }
}
