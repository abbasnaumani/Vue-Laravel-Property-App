<?php
namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'first_name' => 'Super', 'last_name' => 'Admin', 'email' => 'abbasnaumani+1@gmail.com', 'phone_number' => '+923226983833', 'password' => bcrypt('12345678'), 'is_active' => 1, 'is_approved' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'first_name' => 'Admin', 'last_name' => 'User', 'email' => 'abbasnaumani+2@gmail.com', 'phone_number' => '+923456983833', 'password' => bcrypt('12345678'), 'is_active' => 1, 'is_approved' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ];
        DB::table('users')->insert($users);
    }
}
