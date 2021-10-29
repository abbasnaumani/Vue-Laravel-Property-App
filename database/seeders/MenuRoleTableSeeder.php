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
            //            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 3],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 4],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 5],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 6],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 7],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 9],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 10],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 12],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 13],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 14],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 15],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 20],
            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 25],

            //            ['is_allow' => 1, 'role_id' => 1, 'menu_id' => 26],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 1], // Admin
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 2],
            //            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 3],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 4],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 5],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 6],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 7],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 9],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 10],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 12],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 13],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 14],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 15],
            //            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 17],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 18],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 19],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 20],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 23],
            ['is_allow' => 1, 'role_id' => 2, 'menu_id' => 25],
            // EngagementUser
            //            ['is_allow' => 1, 'role_id' => 3, 'menu_id' => 21],
            ['is_allow' => 1, 'role_id' => 3, 'menu_id' => 1],
            ['is_allow' => 1, 'role_id' => 3, 'menu_id' => 22],
            ['is_allow' => 1, 'role_id' => 3, 'menu_id' => 25],
            //            ['is_allow' => 1, 'role_id' => 3, 'menu_id' => 23],
            //            ['is_allow' => 1, 'role_id' => 3, 'menu_id' => 25],
            //Project Manager
            ['is_allow' => 1, 'role_id' => 4, 'menu_id' => 1],
            ['is_allow' => 1, 'role_id' => 4, 'menu_id' => 22],
            ['is_allow' => 1, 'role_id' => 4, 'menu_id' => 25],
            //            ['is_allow' => 1, 'role_id' => 4, 'menu_id' => 24],
            //            ['is_allow' => 1, 'role_id' => 4, 'menu_id' => 25],
            // Developer
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 1],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 26],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 3],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 5],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 8],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 11],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 16],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 17],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 19],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 25],
            ['is_allow' => 1, 'role_id' => 5, 'menu_id' => 27],

            //Human Resource Manager
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 2],
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 4],
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 5],
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 7],
            //            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 8],
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 9],
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 10],
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 13],
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 14],
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 15],
            //            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 16],
            ['is_allow' => 1, 'role_id' => 9, 'menu_id' => 24],
        ];
        DB::table('menu_role')->insert($menuRoles);
    }
}
