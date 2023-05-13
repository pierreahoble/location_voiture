<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Modele;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ModeleControllerTest extends TestCase
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
    public function it_displays_index_view_with_modeles(): void
    {
        $modeles = Modele::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('modeles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.modeles.index')
            ->assertViewHas('modeles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_modele(): void
    {
        $response = $this->get(route('modeles.create'));

        $response->assertOk()->assertViewIs('app.modeles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_modele(): void
    {
        $data = Modele::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('modeles.store'), $data);

        $this->assertDatabaseHas('modeles', $data);

        $modele = Modele::latest('id')->first();

        $response->assertRedirect(route('modeles.edit', $modele));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_modele(): void
    {
        $modele = Modele::factory()->create();

        $response = $this->get(route('modeles.show', $modele));

        $response
            ->assertOk()
            ->assertViewIs('app.modeles.show')
            ->assertViewHas('modele');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_modele(): void
    {
        $modele = Modele::factory()->create();

        $response = $this->get(route('modeles.edit', $modele));

        $response
            ->assertOk()
            ->assertViewIs('app.modeles.edit')
            ->assertViewHas('modele');
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

        $response = $this->put(route('modeles.update', $modele), $data);

        $data['id'] = $modele->id;

        $this->assertDatabaseHas('modeles', $data);

        $response->assertRedirect(route('modeles.edit', $modele));
    }

    /**
     * @test
     */
    public function it_deletes_the_modele(): void
    {
        $modele = Modele::factory()->create();

        $response = $this->delete(route('modeles.destroy', $modele));

        $response->assertRedirect(route('modeles.index'));

        $this->assertModelMissing($modele);
    }
}
