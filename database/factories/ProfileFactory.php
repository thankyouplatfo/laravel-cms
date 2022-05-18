<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
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
            "avatar" => /*$this->faker->imageUrl */ 'images/profile/avatar/avatar-test.png',
            "website" => $this->faker->url(),
            "bio" => $this->faker->realText(255),
            "user_id" => $this->faker->numberBetween(1, 3),
        ];
    }
}
