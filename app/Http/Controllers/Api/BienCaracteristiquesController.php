<?php

namespace App\Http\Controllers\Api;

use App\Models\Bien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaracteristiqueResource;
use App\Http\Resources\CaracteristiqueCollection;

class BienCaracteristiquesController extends Controller
{
    public function index(
        Request $request,
        Bien $bien
    ): CaracteristiqueCollection {
        $this->authorize('view', $bien);

        $search = $request->get('search', '');

        $caracteristiques = $bien
            ->caracteristiques()
            ->search($search)
            ->latest()
            ->paginate();

        return new CaracteristiqueCollection($caracteristiques);
    }

    public function store(Request $request, Bien $bien): CaracteristiqueResource
    {
        $this->authorize('create', Caracteristique::class);

        $validated = $request->validate([
            'designation' => ['required', 'max:255', 'string'],
            'valeur' => ['required', 'max:255', 'string'],
        ]);

        $caracteristique = $bien->caracteristiques()->create($validated);

        return new CaracteristiqueResource($caracteristique);
    }
}
