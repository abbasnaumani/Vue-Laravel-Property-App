<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = [
            ['id' => 1, 'name' => 'Lahore', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'Sheikhupura', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'name' => 'Islamabad', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 4, 'name' => 'Rawalpindi', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 5, 'name' => 'Karachi', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 6, 'name' => 'Faisalabad', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 7, 'name' => 'Gujranwala', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 8, 'name' => 'Multan', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 9, 'name' => 'Gujrat', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 10, 'name' => 'Sialkot', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('cities')->insert($city);
    }
}
