<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Bien;

use App\Models\Type;
use App\Models\Modele;
use App\Models\Marque;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BienControllerTest extends TestCase
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
    public function it_displays_index_view_with_biens(): void
    {
        $biens = Bien::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('biens.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.biens.index')
            ->assertViewHas('biens');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_bien(): void
    {
        $response = $this->get(route('biens.create'));

        $response->assertOk()->assertViewIs('app.biens.create');
    }

    /**
     * @test
     */
    public function it_stores_the_bien(): void
    {
        $data = Bien::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('biens.store'), $data);

        $this->assertDatabaseHas('biens', $data);

        $bien = Bien::latest('id')->first();

        $response->assertRedirect(route('biens.edit', $bien));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_bien(): void
    {
        $bien = Bien::factory()->create();

        $response = $this->get(route('biens.show', $bien));

        $response
            ->assertOk()
            ->assertViewIs('app.biens.show')
            ->assertViewHas('bien');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_bien(): void
    {
        $bien = Bien::factory()->create();

        $response = $this->get(route('biens.edit', $bien));

        $response
            ->assertOk()
            ->assertViewIs('app.biens.edit')
            ->assertViewHas('bien');
    }

    /**
     * @test
     */
    public function it_updates_the_bien(): void
    {
        $bien = Bien::factory()->create();

        $user = User::factory()->create();
        $modele = Modele::factory()->create();
        $marque = Marque::factory()->create();
        $type = Type::factory()->create();

        $data = [
            'designation' => $this->faker->text(255),
            'email' => $this->faker->email,
            'telephone' => $this->faker->text(255),
            'immatriculation' => $this->faker->text(255),
            'prix_jour' => $this->faker->randomNumber(2),
            'annee' => $this->faker->text(255),
            'couleur' => $this->faker->text(255),
            'type_consomation' => $this->faker->text(255),
            'transmission' => $this->faker->text(255),
            'conso_sur_cent' => $this->faker->text(255),
            'moteur' => $this->faker->text(255),
            'Nbre_porte' => $this->faker->text(255),
            'Nbre_place' => $this->faker->text(255),
            'Description' => $this->faker->sentence(15),
            'gerant_id' => $user->id,
            'modele_id' => $modele->id,
            'marque_id' => $marque->id,
            'type_id' => $type->id,
        ];

        $response = $this->put(route('biens.update', $bien), $data);

        $data['id'] = $bien->id;

        $this->assertDatabaseHas('biens', $data);

        $response->assertRedirect(route('biens.edit', $bien));
    }

    /**
     * @test
     */
    public function it_deletes_the_bien(): void
    {
        $bien = Bien::factory()->create();

        $response = $this->delete(route('biens.destroy', $bien));

        $response->assertRedirect(route('biens.index'));

        $this->assertModelMissing($bien);
    }
}
