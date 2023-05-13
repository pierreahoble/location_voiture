<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bien;

use App\Models\Type;
use App\Models\Modele;
use App\Models\Marque;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BienTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_biens_list(): void
    {
        $biens = Bien::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.biens.index'));

        $response->assertOk()->assertSee($biens[0]->designation);
    }

    /**
     * @test
     */
    public function it_stores_the_bien(): void
    {
        $data = Bien::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.biens.store'), $data);

        $this->assertDatabaseHas('biens', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_bien(): void
    {
        $bien = Bien::factory()->create();

        $user = User::factory()->create();
        $modele = Modele::factory()->create();
        $marque = Marque::factory()->create();
        $type = Type::factory()->create();

        $data = [
            'designation' => $this->faker->text(255),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),
            'immatriculation' => $this->faker->text(255),
            'prix_jour' => $this->faker->randomNumber(2),
            'annee' => $this->faker->text(255),
            'couleur' => $this->faker->text(255),
            'type_consomation' => $this->faker->text(255),
            'transmission' => $this->faker->text(255),
            'conso_sur_cent' => $this->faker->text(255),
            'moteur' => $this->faker->text(255),
            'Nbre_porte' => $this->faker->text(255),
            'Nbre_place' => $this->faker->text(255),
            'Description' => $this->faker->sentence(15),
            'gerant_id' => $user->id,
            'modele_id' => $modele->id,
            'marque_id' => $marque->id,
            'type_id' => $type->id,
        ];

        $response = $this->putJson(route('api.biens.update', $bien), $data);

        $data['id'] = $bien->id;

        $this->assertDatabaseHas('biens', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_bien(): void
    {
        $bien = Bien::factory()->create();

        $response = $this->deleteJson(route('api.biens.destroy', $bien));

        $this->assertModelMissing($bien);

        $response->assertNoContent();
    }
}
