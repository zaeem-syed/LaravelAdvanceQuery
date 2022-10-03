<?php

namespace Database\Factories;

use App\Models\comment;
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
            'context' => $this->faker->text(10),
            'user_id' => rand(1,3)
        ];
    }
}
