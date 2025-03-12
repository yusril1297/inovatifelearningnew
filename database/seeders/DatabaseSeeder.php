<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat satu admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 0,
            'password' => bcrypt('12345678'),
        ]);

        // Buat beberapa instructor
        $instructors = User::factory()->createMany([
            ['name' => 'John Doe', 'email' => 'john@gmail.com', 'role' => 1, 'password' => bcrypt('password')],
        ]);

        // Buat kategori
        Category::insert([
            ['name' => 'Web Development', 'slug' => 'web-development'],
            ['name' => 'Mobile Development', 'slug' => 'mobile-development'],
            ['name' => 'Design', 'slug' => 'design'],
        ]);

        // Ambil ulang data kategori setelah insert
        $categories = Category::all();

        // Buat kursus
        Course::insert([
            [
                'title' => 'Learn Web Development',
                'slug' => 'learn-web-development',
                'description' => 'Learn web development from scratch',
                'instructor_id' => $instructors->random()->id,
                'category_id' => 1,
                'level_id' => 1,
                'thumbnail' => 'thumbnail.png',
                'price' => 100000,
                'youtube_thumbnail_url' => 'youtube.com',
                'status' => 'published',
                'certificate_url' => 'certificate.png',
                'meeting_limit' => 10,
            ],
            [
                'title' => 'Learn Mobile Development',
                'slug' => 'learn-mobile-development',
                'description' => 'Learn mobile development from scratch',
                'instructor_id' => $instructors->random()->id,
                'category_id' => 2,
                'level_id' => 1,
                'thumbnail' => 'thumbnail.png',
                'price' => 100000,
                'youtube_thumbnail_url' => 'youtube.com',
                'status' => 'published',
                'certificate_url' => 'certificate.png',
                'meeting_limit' => 10,
            ],
            [
                'title' => 'Learn Design',
                'slug' => 'learn-design',
                'description' => 'Learn design from scratch',
                'instructor_id' => $instructors->random()->id,
                'category_id' => 3,
                'level_id' => 1,
                'thumbnail' => 'thumbnail.png',
                'price' => 100000,
                'youtube_thumbnail_url' => 'youtube.com',
                'status' => 'published',
                'certificate_url' => 'certificate.png',
                'meeting_limit' => 10,
            ],
        ]);

        // Ambil ulang data courses setelah insert
        $courses = Course::all();

        // Buat tags
        $tags = Tag::insert([
            ['name' => 'PHP',],
            ['name' => 'Laravel', ],
            ['name' => 'JavaScript',],
            ['name' => 'Vue.js', ],
            ['name' => 'React.js',],
            ['name' => 'Flutter', ],
            ['name' => 'Swift', ],
            ['name' => 'UI/UX', ],
            ['name' => 'Figma', ],
            ['name' => 'Adobe XD',],
        ]);

        $tags = Tag::all();
        $courses = Course::all();

        // Attach tags ke courses secara random
        $tags->each(function ($tag) use ($courses) {
            $tag->courses()->attach($courses->random(rand(1, 3))->pluck('id')->toArray());
        });
        
        

        // Setting awal (jika ingin diaktifkan)
        // Setting::create([
        //     'name_cors' => 'SocioEdu',
        //     'logo' => 'logo.png',
        //     'path_logo' => 'uploads/logo.png',
        // ]);
    }
}
