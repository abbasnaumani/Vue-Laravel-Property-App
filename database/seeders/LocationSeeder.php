<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = [
            ['id' => '1', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block A', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '2', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block B', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '3', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block C', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '4', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block D', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '5', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block E', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '6', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block E 1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '7', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block-E-2', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '8', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block E 3 4', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '9', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block F', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '10', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block G', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '11', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block H', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '12', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block I', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '13', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block J', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '14', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block K', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '15', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block L', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '16', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block M', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '17', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block N', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => '18', 'city_id'=>'4','name'=>'Bahria Town Phase 8 Block P', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('locations')->insert($location);
    }
}
