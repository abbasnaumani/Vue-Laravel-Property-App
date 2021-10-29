<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySubTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propertySubType = [
            ['id' => 1, 'name' => 'House','property_type_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'Flat','property_type_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 3, 'name' => 'Upper Portion','property_type_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 4, 'name' => 'Lower Portion','property_type_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 5, 'name' => 'Farm House','property_type_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 6, 'name' => 'Room','property_type_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 7, 'name' => 'Pent House','property_type_id' => 1, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 8, 'name' => 'Residential Plot','property_type_id' => 2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 9, 'name' => 'Commercial Plot','property_type_id'=>2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 10, 'name' => 'Agricultural Land ','property_type_id'=>2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 11, 'name' => 'Industrial Land','property_type_id'=>2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 12, 'name' => 'Plot File','property_type_id'=>2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 13, 'name' => 'Plot Form','property_type_id'=>2, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 14, 'name' => 'Office','property_type_id'=>3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 15, 'name' => 'Shop','property_type_id'=>3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 16, 'name' => 'Warehouse','property_type_id'=>3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 17, 'name' => 'Factory','property_type_id'=>3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 18, 'name' => 'Building','property_type_id'=>3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 19, 'name' => 'Other','property_type_id'=>3, 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('property_sub_types')->insert($propertySubType);
    }
}
