<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Type;
use App\Models\Bien;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TypeBiensTest extends TestCase
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
    public function it_gets_type_biens(): void
    {
        $type = Type::factory()->create();
        $biens = Bien::factory()
            ->count(2)
            ->create([
                'type_id' => $type->id,
            ]);

        $response = $this->getJson(route('api.types.biens.index', $type));

        $response->assertOk()->assertSee($biens[0]->designation);
    }

    /**
     * @test
     */
    public function it_stores_the_type_biens(): void
    {
        $type = Type::factory()->create();
        $data = Bien::factory()
            ->make([
                'type_id' => $type->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.types.biens.store', $type),
            $data
        );

        $this->assertDatabaseHas('biens', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $bien = Bien::latest('id')->first();

        $this->assertEquals($type->id, $bien->type_id);
    }
}
