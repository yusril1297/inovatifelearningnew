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
        'certificate_url',
        'meeting_limit', // Tambahkan meeting_limit ke fillable
        'subscription_periods',
        'subscription_duration',
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
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
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
        return $this->hasMany(Pdf::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'enrollment_id');
    }

    // Relasi ke Meetings (one-to-many)
    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    // Menghitung jumlah student yang sudah mendaftar di kursus ini
    public function enrolledCount()
    {
        return $this->enrollments()->count();
    }

    // Relasi ke Student melalui enrollments
    public function students()
    {
        return $this->belongsToMany(User::class, 'enrollments', 'course_id', 'user_id');
    }

    // Mengecek apakah batas meeting sudah tercapai
    public function isMeetingLimitReached()
    {
        return $this->meeting_limit !== null && $this->meetings()->count() >= $this->meeting_limit;
    }
}
