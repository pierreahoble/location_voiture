<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Marque;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MarqueControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_marques(): void
    {
        $marques = Marque::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('marques.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.marques.index')
            ->assertViewHas('marques');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_marque(): void
    {
        $response = $this->get(route('marques.create'));

        $response->assertOk()->assertViewIs('app.marques.create');
    }

    /**
     * @test
     */
    public function it_stores_the_marque(): void
    {
        $data = Marque::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('marques.store'), $data);

        $this->assertDatabaseHas('marques', $data);

        $marque = Marque::latest('id')->first();

        $response->assertRedirect(route('marques.edit', $marque));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_marque(): void
    {
        $marque = Marque::factory()->create();

        $response = $this->get(route('marques.show', $marque));

        $response
            ->assertOk()
            ->assertViewIs('app.marques.show')
            ->assertViewHas('marque');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_marque(): void
    {
        $marque = Marque::factory()->create();

        $response = $this->get(route('marques.edit', $marque));

        $response
            ->assertOk()
            ->assertViewIs('app.marques.edit')
            ->assertViewHas('marque');
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

        $response = $this->put(route('marques.update', $marque), $data);

        $data['id'] = $marque->id;

        $this->assertDatabaseHas('marques', $data);

        $response->assertRedirect(route('marques.edit', $marque));
    }

    /**
     * @test
     */
    public function it_deletes_the_marque(): void
    {
        $marque = Marque::factory()->create();

        $response = $this->delete(route('marques.destroy', $marque));

        $response->assertRedirect(route('marques.index'));

        $this->assertModelMissing($marque);
    }
}
