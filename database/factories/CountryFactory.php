<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\DB;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $continentsID = DB::table('continents')->pluck('id');

        return [
            //
            'name' => $this->faker->name(),
            'code_country' => $this->faker->numberBetween(300,700),
            'code_phone' => $this->faker->numberBetween(300,700),
            'continent_id' => $this->faker->randomElement($continentsID)

        ];
    }
}
