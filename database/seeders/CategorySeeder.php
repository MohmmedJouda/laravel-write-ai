<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Technology',
            'Artificial Intelligence',
            'Business',
            'Finance',
            'Health',
            'Education',
            'Travel',
            'Food',
            'Lifestyle',
            'Fitness',
            'Digital Marketing',
            'Career Development',
            'Productivity',
            'Science',
            'Entertainment',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                [
                    'slug' => Str::slug($category),
                ],
                [
                    'name' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

    }
}
