<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bien;
use App\Models\Commentaire;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BienCommentairesTest extends TestCase
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
    public function it_gets_bien_commentaires(): void
    {
        $bien = Bien::factory()->create();
        $commentaires = Commentaire::factory()
            ->count(2)
            ->create([
                'bien_id' => $bien->id,
            ]);

        $response = $this->getJson(
            route('api.biens.commentaires.index', $bien)
        );

        $response->assertOk()->assertSee($commentaires[0]->nom_prenom);
    }

    /**
     * @test
     */
    public function it_stores_the_bien_commentaires(): void
    {
        $bien = Bien::factory()->create();
        $data = Commentaire::factory()
            ->make([
                'bien_id' => $bien->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.biens.commentaires.store', $bien),
            $data
        );

        unset($data['nom_prenom']);
        unset($data['email']);
        unset($data['telephone']);
        unset($data['message']);
        unset($data['bien_id']);

        $this->assertDatabaseHas('commentaires', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $commentaire = Commentaire::latest('id')->first();

        $this->assertEquals($bien->id, $commentaire->bien_id);
    }
}
