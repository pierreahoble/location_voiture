<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Bien;
use App\Models\Media;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BienAllMediaTest extends TestCase
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
    public function it_gets_bien_all_media(): void
    {
        $bien = Bien::factory()->create();
        $allMedia = Media::factory()
            ->count(2)
            ->create([
                'bien_id' => $bien->id,
            ]);

        $response = $this->getJson(route('api.biens.all-media.index', $bien));

        $response->assertOk()->assertSee($allMedia[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_bien_all_media(): void
    {
        $bien = Bien::factory()->create();
        $data = Media::factory()
            ->make([
                'bien_id' => $bien->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.biens.all-media.store', $bien),
            $data
        );

        $this->assertDatabaseHas('media', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $media = Media::latest('id')->first();

        $this->assertEquals($bien->id, $media->bien_id);
    }
}
