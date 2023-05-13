<?php

namespace Database\Factories;

use App\Models\Marque;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarqueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Marque::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'designation' => $this->faker->text(100),
            'description' => $this->faker->text,
        ];
    }
}
