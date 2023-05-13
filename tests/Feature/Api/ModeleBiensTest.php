<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bien;
use App\Models\Modele;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModeleBiensTest extends TestCase
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
    public function it_gets_modele_biens(): void
    {
        $modele = Modele::factory()->create();
        $biens = Bien::factory()
            ->count(2)
            ->create([
                'modele_id' => $modele->id,
            ]);

        $response = $this->getJson(route('api.modeles.biens.index', $modele));

        $response->assertOk()->assertSee($biens[0]->designation);
    }

    /**
     * @test
     */
    public function it_stores_the_modele_biens(): void
    {
        $modele = Modele::factory()->create();
        $data = Bien::factory()
            ->make([
                'modele_id' => $modele->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.modeles.biens.store', $modele),
            $data
        );

        $this->assertDatabaseHas('biens', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $bien = Bien::latest('id')->first();

        $this->assertEquals($modele->id, $bien->modele_id);
    }
}
