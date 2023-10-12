<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactGegevens>
 */
class ContactGegevensFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voornaam' => fake()->firstName(),
            'achternaam' => fake()->lastName(),
            'contactemail' => fake()->unique()->safeEmail(),
            'telefoonnummer' => fake()->unique()->phoneNumber(),
            'adres' => fake()->streetName() . ' ' . strval(rand(1, 200)),
            'plaats' => fake()->city(),
            'postcode' => strval(rand(1000, 9999)) . strtoupper(Str::random(2)),
        ];
    }
}
