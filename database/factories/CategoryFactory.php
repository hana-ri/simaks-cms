<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->sentence(mt_rand(1,3)),
            "slug" => $this->faker->sentence(mt_rand(1,3)),
            "description" => $this->faker->paragraph()
        ];
    }
}
