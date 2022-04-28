<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title, '-');
        //
        return [
            //
            'title' => $this->faker->realText(25),
            'slug'  => $slug,
            'body'  => $this->faker->realText(550),
            'image_path' => $this->faker->imageUrl(480,175,"car",true,"LARAVEL CMS",000000),
            'approved' => $this->faker->numberBetween(0, 1),
            'user_id' => $this->faker->numberBetween(1, 10),
            'categorie_id' => $this->faker->numberBetween(1, 9),
        ];
    }
}
