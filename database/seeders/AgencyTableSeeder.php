<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agencies = [
            ['id' => 1, 'name' => 'Kode Studio', 'slug' => 'kode-studio','email' => 'info@kodestudio.com','phone_number' => '+923034207957','address' => 'Nashaiman Park street # 1 House # 2 Sheikhupra Lahore Road', 'is_active' => '1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ];
        DB::table('agencies')->insert($agencies);
    }
}
