<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertyType = [
            ['id' => 1, 'name' => 'Homes', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'Plots', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'name' => 'Commercial', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('property_types')->insert($propertyType);
    }
}
