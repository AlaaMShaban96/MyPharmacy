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
                'name' => 'Super Admin',
                'email' => 'admin1@nano-tech.ly',
                'phone' => '0927780208',
                'pharmacy_id' => 1,
                'password' => Hash::make('Nano1234'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Super user',
                'email' => 'super@nano-tech.ly',
                'phone' => '0927780208',
                'pharmacy_id' => null,
                'password' => Hash::make('NanoTechAdmin'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Super2 user',
                'email' => 'super2@nano-tech.ly',
                'phone' => '0927780208',
                'pharmacy_id' => null,
                'password' => Hash::make('NanoTechAdmin'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
