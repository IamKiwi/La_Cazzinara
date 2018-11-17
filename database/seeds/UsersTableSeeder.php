<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Jim',
            'surname' => 'Beam',
            'email' => 'jim@beam.com',
            'password' => Hash::make('qazwsx'),
            'phone_number' => '666999666'
        ]);

        DB::table('users')->insert([
            'name' => 'Johnnie',
            'surname' => 'Walker',
            'email' => 'john@walker.com',
            'password' => Hash::make('qwerty'),
            'phone_number' => '666222666'
        ]);
    }
}
