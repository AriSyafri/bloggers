<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // membuat seeder
        // php artisan db:seed

        //mencoba membuat random
        // User::factory(10)->create();

        // mencoba di singel factory
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // membuat seed manual
        // User::create([
        //     'name' => 'Ari Syafri',
        //     'username' => 'arisyafri15',
        //     'email' => 'arisyafrie.as15@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // Category::create([
        //     'name' => 'Web Design',
        //     'slug' => 'web-design'
        // ]);

        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => 'Laravel includes the ability to seed your database with data using seed classes. All seed classes are stored in the database/seeders directory. By default, a DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.'
        // ]);

        // membuat yang sebelumnya dari tinker
        // penggunaan penggabungan seeder dan facto

        // php artisan megrate:fresh --seed
        // Post::factory(100)->recycle([
        //     Category::factory(3)->create(),
        //     User::factory(5)->create()
        // ])->create();

        //contoh gabungan recycle
        $ari = User::create([
            'name' => 'Ari Syafri',
            'username' => 'arisyafri15',
            'email' => 'arisyafrie.as15@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        Post::factory(100)->recycle([
            Category::factory(3)->create(),
            $ari,
            User::factory(5)->create()
        ])->create();




    }
}
