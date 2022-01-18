<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'Super Admin', 'route' => '/dashboard'],
            ['id' => 2, 'name' => 'Admin', 'route' => '/dashboard'],
            ['id' => 3, 'name' => 'Agency Admin', 'route' => '/dashboard'],
            ['id' => 4, 'name' => 'Agent', 'route' => '/dashboard'],
        ];
        DB::table('roles')->insert($roles);
    }
}
