<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PharmacSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pharmacies')->insert([
  
            [
                'name' => 'صيدالية شارع الزاوية',
                'x'=>'32.726405',
                'y'=>'12.703670',
            ],
            [
                'name' => 'صيدالية الطبي',
                'x'=>'32.726405',
                'y'=>'12.703670',
            ]
        ]);
    }
}
