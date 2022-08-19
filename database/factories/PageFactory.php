<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'pag_name' => $name = $this->faker->sentence(),
            'pag_url' => Str::slug($name),
            'pag_body' => $this->faker->text(2200),
            'pag_state' => 1,
        ];
    }
}
