<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> mt_rand(1, 3),
            'category_id'=> mt_rand(1, 2),
            'title'=> $this->faker->sentence(mt_rand(3,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(10,20)))->map(function($p) {return "<p>$p</p>";})->implode(''),
            'is_published'=> mt_rand(0, 1),
        ];
    }
}
