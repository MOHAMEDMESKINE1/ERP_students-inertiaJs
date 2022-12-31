<?php

namespace Database\Factories;

use App\Models\SchooLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchooLevel>
 */
class SchooLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       SchooLevel::create(['name'=> '6th class']);
       SchooLevel::create(['name'=> '5th class']);
       SchooLevel::create(['name'=> '4th class']);
       SchooLevel::create(['name'=> '3th class']);
       SchooLevel::create(['name'=> '2th class']);
       SchooLevel::create(['name'=> '1th class']);
    }
}
