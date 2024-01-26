<?php

namespace Database\Seeders;

use App\Models\Address;
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
        // $user = factory(\App\Models\User::class)->create();
        // factory(App\Models\Vendor::class, 10)->create();

        \App\Models\User::factory(100)->create()->each(function ($user) {
            $user->address()->save(Address::factory()->make());
        });

        // \App\Models\User::factory(10)->create();
    }
}
