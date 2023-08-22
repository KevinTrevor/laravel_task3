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
            //
                'url_id' => Url::first()->id,
                'amount' => $this->faker->randomElement([300,400,14,51,320,12,1,50,0,5423]),
                'currency' => $this->faker->randomElement(['EUR', 'USD']),
        ];
    }
}
