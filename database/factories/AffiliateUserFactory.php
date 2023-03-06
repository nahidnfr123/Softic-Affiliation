<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AffiliateUser>
 */
class AffiliateUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $email = fake()->unique()->safeEmail();
        return [
            'name' => fake()->name(),
            'email' => $email,
            'email_verified_at' => now(),
            'password' => Hash::make($email), // password
            'remember_token' => Str::random(10),
            'promo_code' => Str::random(6),
        ];
    }
}
