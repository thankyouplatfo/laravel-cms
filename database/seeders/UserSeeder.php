<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory(3)->hasPosts(10)->create();
        //
        DB::table('users')->insert([
            'name' => 'معتز المشكلي',
            'email' => 'moataz795@gmail.com',
            'email_verified_at' => now(),
            'role_id' => '1',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        //
        DB::table('users')->insert([
            'name' => 'شعيب',
            'email' => 'sh795@gmail.com',
            'email_verified_at' => now(),
            'role_id' => '2',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        //
        DB::table('users')->insert([
            'name' => 'مستخدم جديد',
            'email' => 'user795@gmail.com',
            'email_verified_at' => now(),
            'role_id' => '3',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
