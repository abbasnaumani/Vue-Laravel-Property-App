<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menuRoles = [
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 1], // Super Admin
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 2],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 3],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 4],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 5],

            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 1],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 2],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 3],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 4],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 5], // Admin


        ];
        DB::table('menu_role')->insert($menuRoles);
    }
}
