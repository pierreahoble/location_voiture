<?php

namespace Database\Factories;

use App\Models\Commentaire;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commentaire::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_prenom' => $this->faker->text(25),
            'email' => $this->faker->text(25),
            'telephone' => $this->faker->text(25),
            'message' => $this->faker->sentence(20),
            'bien_id' => \App\Models\Bien::factory(),
        ];
    }
}
