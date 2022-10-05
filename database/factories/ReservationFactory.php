<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
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
            'room_id' => $this->faker->numberBetween(1,12),
            'user_id' =>$this->faker->numberBetween(1,3),
            'check_in'=> $this->faker->dateTimeBetween('-7 days','now'),
            'check_out' =>$this->faker->dateTimeBetween('now','+10 days'),
        ];
    }
}
