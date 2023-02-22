<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
                'name' => 'صيدلية شارع الزاوية',
                'x' => '32.726405',
                'y' => '12.703670',
                'address' => 'صيدلية الطبي - شارع الزاوية',
                'user_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'صيدلية الطبي',
                'x' => '32.726405',
                'y' => '12.703670',
                'address' => 'صيدلية الطبي - شارع الزاوية',
                'user_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
