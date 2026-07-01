<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //DB::table('users')->delete();

        DB::table('users')->insert([
<<<<<<< HEAD
            'name' => 'Mohammed Jouda',
            'email' => 'mohammed@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'username' => 'mjouda',
=======
            'name' => 'Admin',
            'email' => 'admin@example.net',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'username' => 'admin',
            'type' => 'admin',
>>>>>>> upstream/main
            'timezone' => 'Asia/Gaza',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
<<<<<<< HEAD
            'name' => 'Ahmed',
            'email' => 'ahmed@gmail.com',
=======
            'name' => 'Super Admin',
            'email' => 'super-admin@example.net',
>>>>>>> upstream/main
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'username' => 'superadmin',
            'timezone' => 'Asia/Gaza',
            'type' => 'super-admin',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
