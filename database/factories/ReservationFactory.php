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
            'city_id' => rand(1,5),
            'user_id' =>$this->faker->numberBetween(1,6),
            'check_in'=> $this->faker->dateTimeBetween('-7 days','now'),
            'check_out' =>$this->faker->dateTimeBetween('now','+10 days'),


        ];
    }
}
