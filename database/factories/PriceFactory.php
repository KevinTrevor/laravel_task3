<?php

namespace Database\Factories;

use App\Models\Url;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'url_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
                'amount' => $this->faker->randomElement([300.99,400.75,14.00,51,320,12,1.5,50.99,580.74]),
                'currency' => $this->faker->randomElement(['EUR', 'USD']),
        ];
    }
}
