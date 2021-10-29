<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areaUnit = [
            ['id' => 1, 'name' => 'Square Feet', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'Square Meters', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'name' => 'Square Yards', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 4, 'name' => 'Marla', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 5, 'name' => 'Kanal', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],

        ];
        DB::table('area_units')->insert($areaUnit);
    }
}
