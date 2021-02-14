<?php

namespace Database\Seeders;

use Database\Seeders\UserSeed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PharmacSeed::class);
        $this->call(UserSeed::class);
       
        $this->call(OrderSeed::class);

        // \App\Models\User::factory(10)->create();
    }
}
