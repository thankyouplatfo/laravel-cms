<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '1'
        ]);

        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '2'
        ]);

        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '3'
        ]);

        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '4'
        ]);

        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '5'
        ]);

        DB::table('permission_role')->insert([
            'role_id' => '1',
            'permission_id' => '6'
        ]);
        //
        DB::table('permission_role')->insert([
            'role_id' => '2',
            'permission_id' => '1'
        ]);
        //
        DB::table('permission_role')->insert([
            'role_id' => '2',
            'permission_id' => '2'
        ]);
    }
}
