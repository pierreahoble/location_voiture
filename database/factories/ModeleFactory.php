<?php

namespace Database\Factories;

use App\Models\Modele;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModeleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Modele::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'designation' => $this->faker->text(25),
            'description' => $this->faker->sentence(15),
        ];
    }
}
