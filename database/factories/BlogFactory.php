<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->title();
        return [
        "title" => $title,
        "slug" => Str::slug($title),
        "body" => $this->faker->paragraph(),
        "author_name" => $this->faker->name(),
        "categories_id" => $this->faker->numberBetween(1,7)
        ];
    }
}
