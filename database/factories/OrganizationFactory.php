<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    function definition(): array
    {
        return [
            'name' => $this->faker->company(),
        ];
    }
}
