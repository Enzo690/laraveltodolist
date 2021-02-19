<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Country::factory()
            ->has(Contact::factory()->count(4))
            ->count(10)
            ->create();
        City::factory()
            ->has(Contact::factory()->count(4))
            ->count(10)
            ->create();
    }
}
