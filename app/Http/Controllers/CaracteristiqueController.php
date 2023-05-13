<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Caracteristique;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CaracteristiqueStoreRequest;
use App\Http\Requests\CaracteristiqueUpdateRequest;

class CaracteristiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Caracteristique::class);

        $search = $request->get('search', '');

        $caracteristiques = Caracteristique::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.caracteristiques.index',
            compact('caracteristiques', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Caracteristique::class);

        $biens = Bien::pluck('designation', 'id');

        return view('app.caracteristiques.create', compact('biens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CaracteristiqueStoreRequest $request
    ): RedirectResponse {
        $this->authorize('create', Caracteristique::class);

        $validated = $request->validated();

        $caracteristique = Caracteristique::create($validated);

        return redirect()
            ->route('caracteristiques.edit', $caracteristique)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(
        Request $request,
        Caracteristique $caracteristique
    ): View {
        $this->authorize('view', $caracteristique);

        return view('app.caracteristiques.show', compact('caracteristique'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Request $request,
        Caracteristique $caracteristique
    ): View {
        $this->authorize('update', $caracteristique);

        $biens = Bien::pluck('designation', 'id');

        return view(
            'app.caracteristiques.edit',
            compact('caracteristique', 'biens')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CaracteristiqueUpdateRequest $request,
        Caracteristique $caracteristique
    ): RedirectResponse {
        $this->authorize('update', $caracteristique);

        $validated = $request->validated();

        $caracteristique->update($validated);

        return redirect()
            ->route('caracteristiques.edit', $caracteristique)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Caracteristique $caracteristique
    ): RedirectResponse {
        $this->authorize('delete', $caracteristique);

        $caracteristique->delete();

        return redirect()
            ->route('caracteristiques.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
