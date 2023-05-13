<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bien;
use App\Models\Marque;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MarqueBiensTest extends TestCase
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
    public function it_gets_marque_biens(): void
    {
        $marque = Marque::factory()->create();
        $biens = Bien::factory()
            ->count(2)
            ->create([
                'marque_id' => $marque->id,
            ]);

        $response = $this->getJson(route('api.marques.biens.index', $marque));

        $response->assertOk()->assertSee($biens[0]->designation);
    }

    /**
     * @test
     */
    public function it_stores_the_marque_biens(): void
    {
        $marque = Marque::factory()->create();
        $data = Bien::factory()
            ->make([
                'marque_id' => $marque->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.marques.biens.store', $marque),
            $data
        );

        $this->assertDatabaseHas('biens', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $bien = Bien::latest('id')->first();

        $this->assertEquals($marque->id, $bien->marque_id);
    }
}
