<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'role' => 'مدير'
        ]);
        //
        DB::table('roles')->insert([
            'role' => 'مستخدم جديد'
        ]);
        //
        DB::table('roles')->insert([
            'role' => 'مستخدم فعال'
        ]);
    }
}
