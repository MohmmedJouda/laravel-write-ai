<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // جلب users و categories مرة واحدة (أفضل أداء)
        $userIds = DB::table('users')->pluck('id')->toArray();

        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        // تأكد أنه يوجد بيانات
        if (empty($userIds) || empty($categoryIds)) {
            throw new \Exception("Users or Categories table is empty!");
        }

        // عدد البوستات (20 إلى 100)
        $postsCount = rand(20, 100);

        for ($i = 1; $i <= $postsCount; $i++) {

            $title = $faker->sentence(6);

            DB::table('posts')->insert([
                'user_id' => $faker->randomElement($userIds),
                'category_id' => $faker->randomElement($categoryIds),
                'title' => $title,
                'slug' => Str::slug($title) . '-' . $i,
                'content' => $faker->paragraphs(rand(3, 8), true),
                'excerpt' => $faker->sentence(15),
                'cover_image' => null,
                'status' => $faker->randomElement(['published', 'draft']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
