<?php

namespace Database\Seeders;

use Database\Seeders\UserSeed;
use Illuminate\Database\Seeder;
use Database\Seeders\AdvertisingSeed;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeed::class);
        $this->call(PharmacSeed::class);
        $this->call(AdvertisingSeed::class);
       
        // $this->call(OrderSeed::class);

        // \App\Models\User::factory(10)->create();
    }
}
