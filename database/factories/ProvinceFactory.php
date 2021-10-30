<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\DB;

class ProvinceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $countriesID = DB::table('countries')->pluck('id');
        return [
            //
            'name' => $this->faker->name(),
            'country_id' => $this->faker->randomElement($countriesID)
        ];
    }
}
