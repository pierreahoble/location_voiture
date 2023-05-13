<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Marque;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MarqueTest extends TestCase
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
    public function it_gets_marques_list(): void
    {
        $marques = Marque::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.marques.index'));

        $response->assertOk()->assertSee($marques[0]->designation);
    }

    /**
     * @test
     */
    public function it_stores_the_marque(): void
    {
        $data = Marque::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.marques.store'), $data);

        $this->assertDatabaseHas('marques', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_marque(): void
    {
        $marque = Marque::factory()->create();

        $data = [
            'designation' => $this->faker->text(100),
            'description' => $this->faker->text,
        ];

        $response = $this->putJson(route('api.marques.update', $marque), $data);

        $data['id'] = $marque->id;

        $this->assertDatabaseHas('marques', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_marque(): void
    {
        $marque = Marque::factory()->create();

        $response = $this->deleteJson(route('api.marques.destroy', $marque));

        $this->assertModelMissing($marque);

        $response->assertNoContent();
    }
}
