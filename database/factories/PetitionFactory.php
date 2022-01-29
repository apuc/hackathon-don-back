<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Exception;
use Faker\Core\Number;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PetitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'address_id' => Address::factory(),
            'description' => Str::random(300),
            'rating' => random_int(0, 1000),
            'views' => random_int(0, 100000),
            'created_at' => now(),
        ];
    }
}
