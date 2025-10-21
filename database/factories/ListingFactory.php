<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            "mail" => fake()->companyEmail(),
            "website" => fake()->url(),
            "company" => fake()->companyEmail(),
            "tags" => "PHP,Lravel,Web",
            "description" => fake()->paragraph(5)
        ];
    }
}
