<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertisingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertisings')->insert([
  
            [
                'image' => 'https://media.sproutsocial.com/uploads/2018/05/Facebook-Ad-Examples.png',
                'text' => ' افضل العروض من الشركة العالمية لي علاج الكورونا',
                'pharmacy_id' =>2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'image' => 'https://media.sproutsocial.com/uploads/2018/05/Facebook-Ad-Examples.png',
                'text' => 'افضل العروض من الشركة العالمية لي علاج الكوحة',
                'pharmacy_id' =>1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        
        ]);
    }
}
