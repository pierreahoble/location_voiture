<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Caracteristique;

use App\Models\Bien;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaracteristiqueTest extends TestCase
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
    public function it_gets_caracteristiques_list(): void
    {
        $caracteristiques = Caracteristique::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.caracteristiques.index'));

        $response->assertOk()->assertSee($caracteristiques[0]->designation);
    }

    /**
     * @test
     */
    public function it_stores_the_caracteristique(): void
    {
        $data = Caracteristique::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.caracteristiques.store'), $data);

        $this->assertDatabaseHas('caracteristiques', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_caracteristique(): void
    {
        $caracteristique = Caracteristique::factory()->create();

        $bien = Bien::factory()->create();

        $data = [
            'designation' => $this->faker->text(255),
            'valeur' => $this->faker->sentence(15),
            'bien_id' => $bien->id,
        ];

        $response = $this->putJson(
            route('api.caracteristiques.update', $caracteristique),
            $data
        );

        $data['id'] = $caracteristique->id;

        $this->assertDatabaseHas('caracteristiques', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_caracteristique(): void
    {
        $caracteristique = Caracteristique::factory()->create();

        $response = $this->deleteJson(
            route('api.caracteristiques.destroy', $caracteristique)
        );

        $this->assertModelMissing($caracteristique);

        $response->assertNoContent();
    }
}
