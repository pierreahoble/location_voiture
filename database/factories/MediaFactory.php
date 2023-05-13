<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->text(20),
            'lien' => $this->faker->text(25),
            'bien_id' => \App\Models\Bien::factory(),
        ];
    }
}
