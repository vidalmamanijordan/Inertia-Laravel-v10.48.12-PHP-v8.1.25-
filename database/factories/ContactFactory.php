<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'organization_id' => Organization::all()->random()->id,
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => $this->faker->sentence(),
            'state' => $this->faker->state(),
            'country_id' => Country::all()->random()->id,
            'postal_code' => $this->faker->postcode()
        ];
    }
}
