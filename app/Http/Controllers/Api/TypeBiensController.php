<?php

namespace App\Http\Controllers\Api;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Resources\BienResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\BienCollection;

class TypeBiensController extends Controller
{
    public function index(Request $request, Type $type): BienCollection
    {
        $this->authorize('view', $type);

        $search = $request->get('search', '');

        $biens = $type
            ->biens()
            ->search($search)
            ->latest()
            ->paginate();

        return new BienCollection($biens);
    }

    public function store(Request $request, Type $type): BienResource
    {
        $this->authorize('create', Bien::class);

        $validated = $request->validate([
            'designation' => ['required', 'max:255', 'string'],
            'email' => ['nullable', 'email'],
            'telephone' => ['nullable', 'max:255', 'string'],
            'immatriculation' => ['nullable', 'max:255', 'string'],
            'prix_jour' => ['nullable', 'numeric'],
            'annee' => ['nullable', 'max:255', 'string'],
            'couleur' => ['nullable', 'max:255', 'string'],
            'type_consomation' => ['nullable', 'max:255', 'string'],
            'transmission' => ['nullable', 'max:255', 'string'],
            'conso_sur_cent' => ['nullable', 'max:255', 'string'],
            'moteur' => ['nullable', 'max:255', 'string'],
            'Nbre_porte' => ['nullable', 'max:255', 'string'],
            'Nbre_place' => ['nullable', 'max:255', 'string'],
            'Description' => ['nullable', 'max:255', 'string'],
            'gerant_id' => ['nullable', 'exists:users,id'],
            'modele_id' => ['required', 'exists:modeles,id'],
            'marque_id' => ['required', 'exists:marques,id'],
        ]);

        $bien = $type->biens()->create($validated);

        return new BienResource($bien);
    }
}
