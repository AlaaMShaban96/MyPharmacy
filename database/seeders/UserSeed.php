<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
  
            [
                'name' => 'Admin',
                'email' => 'alzwyastrest@gmail.com',
                'phone' => '0927780208',
                'pharmacy_id' => 1,
                'status' => 1,
                'password' => Hash::make('Nano1234'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Admin',
                'email' => 'altebe@gmail.com',
                'phone' => '0927780208',
                'pharmacy_id' => 2,
                'status' => 1,
                'password' => Hash::make('Nano1234'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'هشام القوي',
                'email' => 'admin2@nano-tech.ly',
                'phone' => '0927780208',
                'pharmacy_id' => null,
                'status' => 0,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'علاء',
                'email' => 'admin@nano-tech.ly',
                'phone' => '0927780208',
                'pharmacy_id' => null,
                'status' => 0,
                'password' => Hash::make('12345678'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
