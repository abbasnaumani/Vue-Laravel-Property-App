<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['id' => 1, 'name' => 'Dashboard', 'parent_id' => 0, 'route' => 'dashboard', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'si si-cursor', 'is_count' => 0, 'is_active' => 1],
            ['id' => 2, 'name' => 'Users', 'parent_id' => 5, 'route' => 'user.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-users', 'is_count' => 0, 'is_active' => 1],
            ['id' => 3, 'name' => 'User Profile', 'parent_id' => 5, 'route' => 'user.edit.profile', 'sort_order' => 0, 'class' => 'nav-main-link-submenu', 'icon' => 'fa fa-users', 'is_count' => 0, 'is_active' => 1],
            ['id' => 4, 'name' => 'Role', 'parent_id' => 0, 'route' => 'role.list', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 5, 'name' => 'User Section', 'parent_id' => 0, 'route' => 'user.*', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],
            ['id' => 6, 'name' => 'Property', 'parent_id' => 0, 'route' => 'property', 'sort_order' => 0, 'class' => 'nav-main-link-name', 'icon' => 'fa fa-user', 'is_count' => 0, 'is_active' => 1],

        ];
        DB::table('menus')->insert($menus);
    }
}
