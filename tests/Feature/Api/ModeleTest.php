<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Modele;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModeleTest extends TestCase
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
    public function it_gets_modeles_list(): void
    {
        $modeles = Modele::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.modeles.index'));

        $response->assertOk()->assertSee($modeles[0]->designation);
    }

    /**
     * @test
     */
    public function it_stores_the_modele(): void
    {
        $data = Modele::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.modeles.store'), $data);

        $this->assertDatabaseHas('modeles', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_modele(): void
    {
        $modele = Modele::factory()->create();

        $data = [
            'designation' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->putJson(route('api.modeles.update', $modele), $data);

        $data['id'] = $modele->id;

        $this->assertDatabaseHas('modeles', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_modele(): void
    {
        $modele = Modele::factory()->create();

        $response = $this->deleteJson(route('api.modeles.destroy', $modele));

        $this->assertModelMissing($modele);

        $response->assertNoContent();
    }
}
