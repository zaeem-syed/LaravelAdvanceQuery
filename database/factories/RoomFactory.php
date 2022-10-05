<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
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
            'room_number' => $this->faker->unique()->numberBetween(1,20),
            'size' =>$this->faker->numberBetween(1,5),
            'price' => $this->faker->numberBetween(100.00,300.00),
            'description' => $this->faker->text(20),

        ];
    }
}
