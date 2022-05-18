<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'body' => $this->faker->realText(255),
            'user_id' => $this->faker->numberBetween(1,3),
            'post_id' => $this->faker->numberBetween(1,3),
        ];
    }
}
