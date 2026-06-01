<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DB::table('categories')->insert([
        //     'name' => 'Travel',
        //     'slug' => 'travel',
        //     'description' => 'Category for travel-related posts.',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // $category = DB::table('categories')
        //     ->where('slug', 'general')
        //     ->orderBy('id', 'desc')
        //     ->limit(1)
        //     ->first();

        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'category_id' => $category->id,
        //     'title' => 'My First Post',
        //     'content' => 'This is the content of my first post.',
        //     'slug' => 'my-first-post',
        //     'excerpt' => 'This is the content of my first post.',
        //     'cover_image' => null,
        //     'status' => 'published',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // DB::table('posts')->insert([
        //     'user_id' => 1,
        //     'category_id' => $category->id,
        //     'title' => 'My Second Post',
        //     'content' => 'This is the content of my second post.',
        //     'slug' => 'my-second-post',
        //     'excerpt' => 'This is the content of my second post.',
        //     'cover_image' => null,
        //     'status' => 'published',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);


        // -----
        // 1. التعامل مع التصنيف (مضمون 100%)
        $category = DB::table('categories')->where('slug', 'general')->first();

        if ($category) {
            $categoryId = $category->id;
        } else {
            $categoryId = DB::table('categories')->insertGetId([
                'name' => 'General',
                'slug' => 'general',
                'description' => 'General category for posts.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. التعامل مع المستخدم بطريقة insertGetId (لضمان الحصول على الـ ID الصحيح من قاعدة البيانات)
        $user = DB::table('users')->first(); // نرى إن كان هناك أي مستخدم أولاً

        if ($user) {
            $userId = $user->id;
        } else {
            // إذا لم يوجد مستخدم، ننشئه مع إضافة حقل الـ username الإجباري للمشروع
            $userId = DB::table('users')->insertGetId([
                'name' => 'Admin User',
                'username' => 'admin', // الحقل الذي كان يسبب المشكلة
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 3. إدخال المنشورات باستخدام الـ $userId والـ $categoryId المضمونين بالكامل
        DB::table('posts')->insert([
            'user_id' => $userId,
            'category_id' => $categoryId,
            'title' => 'My First Post',
            'content' => 'This is the content of my first post.',
            'slug' => 'my-first-post',
            'excerpt' => 'This is the content of my first post.',
            'cover_image' => null,
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('posts')->insert([
            'user_id' => $userId,
            'category_id' => $categoryId,
            'title' => 'My Second Post',
            'content' => 'This is the content of my second post.',
            'slug' => 'my-second-post',
            'excerpt' => 'This is the content of my second post.',
            'cover_image' => null,
            'status' => 'published',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
