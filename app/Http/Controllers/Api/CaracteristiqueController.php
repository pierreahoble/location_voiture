<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Caracteristique;
use App\Http\Controllers\Controller;
use App\Http\Resources\CaracteristiqueResource;
use App\Http\Resources\CaracteristiqueCollection;
use App\Http\Requests\CaracteristiqueStoreRequest;
use App\Http\Requests\CaracteristiqueUpdateRequest;

class CaracteristiqueController extends Controller
{
    public function index(Request $request): CaracteristiqueCollection
    {
        $this->authorize('view-any', Caracteristique::class);

        $search = $request->get('search', '');

        $caracteristiques = Caracteristique::search($search)
            ->latest()
            ->paginate();

        return new CaracteristiqueCollection($caracteristiques);
    }

    public function store(
        CaracteristiqueStoreRequest $request
    ): CaracteristiqueResource {
        $this->authorize('create', Caracteristique::class);

        $validated = $request->validated();

        $caracteristique = Caracteristique::create($validated);

        return new CaracteristiqueResource($caracteristique);
    }

    public function show(
        Request $request,
        Caracteristique $caracteristique
    ): CaracteristiqueResource {
        $this->authorize('view', $caracteristique);

        return new CaracteristiqueResource($caracteristique);
    }

    public function update(
        CaracteristiqueUpdateRequest $request,
        Caracteristique $caracteristique
    ): CaracteristiqueResource {
        $this->authorize('update', $caracteristique);

        $validated = $request->validated();

        $caracteristique->update($validated);

        return new CaracteristiqueResource($caracteristique);
    }

    public function destroy(
        Request $request,
        Caracteristique $caracteristique
    ): Response {
        $this->authorize('delete', $caracteristique);

        $caracteristique->delete();

        return response()->noContent();
    }
}
