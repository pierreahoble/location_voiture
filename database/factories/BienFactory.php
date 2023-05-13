<?php

namespace Database\Factories;

use App\Models\Bien;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Bien::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'designation' => $this->faker->text(25),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(25),
            'immatriculation' => $this->faker->text(25),
            'prix_jour' => $this->faker->randomNumber(2),
            'annee' => $this->faker->text(25),
            'couleur' => $this->faker->text(25),
            'type_consomation' => $this->faker->text(25),
            'transmission' => $this->faker->text(25),
            'conso_sur_cent' => $this->faker->text(25),
            'moteur' => $this->faker->text(25),
            'Nbre_porte' => $this->faker->text(25),
            'Nbre_place' => $this->faker->text(25),
            'Description' => $this->faker->sentence(15),
            'gerant_id' => \App\Models\User::factory(),
            'modele_id' => \App\Models\Modele::factory(),
            'marque_id' => \App\Models\Marque::factory(),
            'type_id' => \App\Models\Type::factory(),
        ];
    }
}
