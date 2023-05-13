<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bien;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserBiensTest extends TestCase
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
    public function it_gets_user_biens(): void
    {
        $user = User::factory()->create();
        $biens = Bien::factory()
            ->count(2)
            ->create([
                'gerant_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.biens.index', $user));

        $response->assertOk()->assertSee($biens[0]->designation);
    }

    /**
     * @test
     */
    public function it_stores_the_user_biens(): void
    {
        $user = User::factory()->create();
        $data = Bien::factory()
            ->make([
                'gerant_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.biens.store', $user),
            $data
        );

        $this->assertDatabaseHas('biens', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $bien = Bien::latest('id')->first();

        $this->assertEquals($user->id, $bien->gerant_id);
    }
}
