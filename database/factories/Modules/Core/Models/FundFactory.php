<?php

namespace Database\Factories\Modules\Core\Models;

use App\Modules\Core\Models\Fund;
use App\Modules\Core\Models\FundManager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Modules\Core\Models\Fund>
 */
class FundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fund::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::orderedUuid(),
            'name' => fake()->words(3, true),
            'start_year' => fake()->year,
            'manager_id' => FundManager::factory(),
        ];
    }
}
