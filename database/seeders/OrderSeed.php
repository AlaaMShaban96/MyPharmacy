<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
  
            [
                'image' => 'https://assets.sainsburys-groceries.co.uk/gol/7459770/1/640x640.jpg',
                'name' => 'Panadol Extra',
                'text' => 'الدواء خاص بالناس الي مريضة بي القلب و السكر',
                'user_id' =>2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'image' => 'https://assets.sainsburys-groceries.co.uk/gol/7459770/1/640x640.jpg',
                'name' => 'Panadol Extra',
                'text' => 'الدواء خاص بالناس الي مريضة بي القلب و السكر',
                'user_id' =>3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        
        ]);
    }
}
