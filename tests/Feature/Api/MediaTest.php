<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Media;

use App\Models\Bien;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MediaTest extends TestCase
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
    public function it_gets_all_media_list(): void
    {
        $allMedia = Media::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-media.index'));

        $response->assertOk()->assertSee($allMedia[0]->type);
    }

    /**
     * @test
     */
    public function it_stores_the_media(): void
    {
        $data = Media::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-media.store'), $data);

        $this->assertDatabaseHas('media', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_media(): void
    {
        $media = Media::factory()->create();

        $bien = Bien::factory()->create();

        $data = [
            'type' => $this->faker->text(20),
            'lien' => $this->faker->text(255),
            'bien_id' => $bien->id,
        ];

        $response = $this->putJson(
            route('api.all-media.update', $media),
            $data
        );

        $data['id'] = $media->id;

        $this->assertDatabaseHas('media', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_media(): void
    {
        $media = Media::factory()->create();

        $response = $this->deleteJson(route('api.all-media.destroy', $media));

        $this->assertModelMissing($media);

        $response->assertNoContent();
    }
}
