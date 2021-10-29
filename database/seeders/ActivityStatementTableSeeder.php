<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityStatementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            ['id' => 1, 'statement' => 'login'],
            ['id' => 2, 'statement' => 'unity_login'],
            ['id' => 3, 'statement' => 'logout'],
            ['id' => 4, 'statement' => 'sign up'],
            ['id' => 5, 'statement' => 'email verified'],
            ['id' => 6, 'statement' => 'reset password email sent'],
            ['id' => 7, 'statement' => 'password reset successfully']
        ];
        DB::table('activity_statements')->insert($activities);
    }
}
