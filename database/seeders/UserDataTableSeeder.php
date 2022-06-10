<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_data')->insert([
            'id_num' => 'A11111',
            'account' => 'admin',
            'password' => 'admin',
            'user_name' => '村長',
            'auth' => 0,
            'user_birth' => '2001-01-01',
        ]);
    }
}
