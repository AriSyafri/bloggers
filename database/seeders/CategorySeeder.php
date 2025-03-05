<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(3)->create();
        Category::create([
            'name' => 'Web Dev',
            'slug' => 'web-dev'
        ]);

        Category::create([
            'name' => 'Mobile Dev',
            'slug' => 'mob-dev'
        ]);

        Category::create([
            'name' => 'Fullstack Dev',
            'slug' => 'fullstack-dev'
        ]);
    }
}
