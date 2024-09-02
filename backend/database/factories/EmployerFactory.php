<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{

    /**
     * @inheritDoc
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'employerCode' => fake()->numerify('#####'),
        ];
    }
}
