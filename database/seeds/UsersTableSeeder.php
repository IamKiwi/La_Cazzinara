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
            'address' => 'Lwowska, 69, Sosnowiec, 41-205',
            'sex' => 'm',
            'phone_number' => '666999666',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Johnnie',
            'surname' => 'Walker',
            'email' => 'john@walker.com',
            'password' => Hash::make('qwerty'),
            'address' => 'Kręta, 33, Sosnowiec, 41-200',
            'sex' => 'm',
            'phone_number' => '666222666',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'Morgan',
            'surname' => 'Captain',
            'email' => 'morgan@captain.com',
            'password' => Hash::make('qwerty'),
            'address' => 'Żeglarzy, 211/43, Sosnowiec, 41-200',
            'sex' => 'm',
            'phone_number' => '997997997',
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now()
        ]);
    }
}
