<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgencyUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agencyUser = [
            ['id' => 1, 'user_id' => '1', 'agency_id' => '1', 'role_id' => '2', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'user_id' => '2', 'agency_id' => '1', 'role_id' => '3', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('agency_user')->insert($agencyUser);
    }
}
