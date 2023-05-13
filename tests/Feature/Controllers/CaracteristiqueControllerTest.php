<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Caracteristique;

use App\Models\Bien;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CaracteristiqueControllerTest extends TestCase
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
    public function it_displays_index_view_with_caracteristiques(): void
    {
        $caracteristiques = Caracteristique::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('caracteristiques.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.caracteristiques.index')
            ->assertViewHas('caracteristiques');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_caracteristique(): void
    {
        $response = $this->get(route('caracteristiques.create'));

        $response->assertOk()->assertViewIs('app.caracteristiques.create');
    }

    /**
     * @test
     */
    public function it_stores_the_caracteristique(): void
    {
        $data = Caracteristique::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('caracteristiques.store'), $data);

        $this->assertDatabaseHas('caracteristiques', $data);

        $caracteristique = Caracteristique::latest('id')->first();

        $response->assertRedirect(
            route('caracteristiques.edit', $caracteristique)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_caracteristique(): void
    {
        $caracteristique = Caracteristique::factory()->create();

        $response = $this->get(
            route('caracteristiques.show', $caracteristique)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.caracteristiques.show')
            ->assertViewHas('caracteristique');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_caracteristique(): void
    {
        $caracteristique = Caracteristique::factory()->create();

        $response = $this->get(
            route('caracteristiques.edit', $caracteristique)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.caracteristiques.edit')
            ->assertViewHas('caracteristique');
    }

    /**
     * @test
     */
    public function it_updates_the_caracteristique(): void
    {
        $caracteristique = Caracteristique::factory()->create();

        $bien = Bien::factory()->create();

        $data = [
            'designation' => $this->faker->text(255),
            'valeur' => $this->faker->sentence(15),
            'bien_id' => $bien->id,
        ];

        $response = $this->put(
            route('caracteristiques.update', $caracteristique),
            $data
        );

        $data['id'] = $caracteristique->id;

        $this->assertDatabaseHas('caracteristiques', $data);

        $response->assertRedirect(
            route('caracteristiques.edit', $caracteristique)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_caracteristique(): void
    {
        $caracteristique = Caracteristique::factory()->create();

        $response = $this->delete(
            route('caracteristiques.destroy', $caracteristique)
        );

        $response->assertRedirect(route('caracteristiques.index'));

        $this->assertModelMissing($caracteristique);
    }
}
