<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Country;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Country::factory(5)->create();
        Organization::factory(20)->create();
        Contact::factory(100)->create();
    }
}
