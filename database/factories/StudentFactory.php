<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $gender = $this->fake()->randomElement(['male', 'female']);
        return [
             'first_name' => fake()->firstName(),
             'last_name' => fake()->lastName(),
             'gender' =>['male', 'female'][rand(0,1)],
             'age'=> random_int(10,24),
             'schoo_level_id'=>rand(1,6)
            //  'photo'=>fake()->pho
        ];
    }
}
