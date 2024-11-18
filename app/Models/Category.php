<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    protected $guarded = [
        'web',
    ];

   // Menyimpan slug secara otomatis saat menyimpan category
   public static function boot()
   {
       parent::boot();

       static::creating(function ($category) {
           $category->slug = Str::slug($category->name);
       });

       static::updating(function ($category) {
           $category->slug = Str::slug($category->name);
       });
   }

   // Relasi one-to-many dengan model Course
   public function courses()
   {
       return $this->hasMany(Course::class);
   }

   // Scope untuk mendapatkan kategori berdasarkan slug
   public function scopeFindBySlug($query, $slug)
   {
       return $query->where('slug', $slug);
   }

 

}
