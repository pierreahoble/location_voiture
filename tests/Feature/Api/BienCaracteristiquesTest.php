<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bien;
use App\Models\Caracteristique;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BienCaracteristiquesTest extends TestCase
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
    public function it_gets_bien_caracteristiques(): void
    {
        $bien = Bien::factory()->create();
        $caracteristiques = Caracteristique::factory()
            ->count(2)
            ->create([
                'bien_id' => $bien->id,
            ]);

        $response = $this->getJson(
            route('api.biens.caracteristiques.index', $bien)
        );

        $response->assertOk()->assertSee($caracteristiques[0]->designation);
    }

    /**
     * @test
     */
    public function it_stores_the_bien_caracteristiques(): void
    {
        $bien = Bien::factory()->create();
        $data = Caracteristique::factory()
            ->make([
                'bien_id' => $bien->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.biens.caracteristiques.store', $bien),
            $data
        );

        $this->assertDatabaseHas('caracteristiques', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $caracteristique = Caracteristique::latest('id')->first();

        $this->assertEquals($bien->id, $caracteristique->bien_id);
    }
}
