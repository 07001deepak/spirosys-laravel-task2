<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bid>
 */
class BidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::all()->random()->id,
            'company_name' => fake()->company,
            'bid_amount' => fake()->randomFloat(2, 1000, 50000),
            'bid_date' => fake()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
