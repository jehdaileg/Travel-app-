<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MoveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $continentsID = DB::table('continents')->pluck('id');
        $countriesID = DB::table('countries')->pluck('id');
        $provincesID = DB::table('provinces')->pluck('id');


        return [
            //

            'code_move' => $this->faker->numberBetween(200, 500),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(80),
            'departure_day' => Carbon::now()
                                      ->subDays(rand(2,20))
                                      ->format('Y-m-d H:i:s'),

            'country_id' => $this->faker->randomElement($countriesID),
            'continent_id' => $this->faker->randomElement($continentsID),
            'province_id' => $this->faker->randomElement($provincesID)

        ];
    }
}
