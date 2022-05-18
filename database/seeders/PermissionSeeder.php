<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            'title' => 'add-post',
            'desc' => 'إضافة المواضيع'
        ]);

        DB::table('permissions')->insert([
            'title' => 'edit-post',
            'desc' => 'تعديل المواضيع'
        ]);

        DB::table('permissions')->insert([
            'title' => 'delete-post',
            'desc' => 'حذف المواضيع'
        ]);

        DB::table('permissions')->insert([
            'title' => 'add-user',
            'desc' => 'إضافة المستخدمين'
        ]);

        DB::table('permissions')->insert([
            'title' => 'edit-user',
            'desc' => 'تعديل بيانات المستخدمين'
        ]);

        DB::table('permissions')->insert([
            'title' => 'delete-user',
            'desc' => 'حذف المستخدمين'
        ]);
    }
}
