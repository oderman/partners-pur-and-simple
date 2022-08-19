<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'par_name' => $this->faker->sentence(),
            'par_logo' => $this->faker->text(6).'jpg',
            'par_website' => $this->faker->text(10).'com',
            'par_state' => 1,
            'par_position' => $this->faker->randomDigit(),
        ];
    }
}
