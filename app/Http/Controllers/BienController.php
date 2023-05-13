<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Type;
use App\Models\User;
use App\Models\Modele;
use App\Models\Marque;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BienStoreRequest;
use App\Http\Requests\BienUpdateRequest;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Bien::class);

        $search = $request->get('search', '');

        $biens = Bien::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.biens.index', compact('biens', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Bien::class);

        $types = Type::pluck('designation', 'id');
        $users = User::pluck('nom_prenom', 'id');
        $modeles = Modele::pluck('designation', 'id');
        $marques = Marque::pluck('designation', 'id');

        return view(
            'app.biens.create',
            compact('types', 'users', 'modeles', 'marques')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BienStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Bien::class);

        $validated = $request->validated();

        $bien = Bien::create($validated);

        return redirect()
            ->route('biens.edit', $bien)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Bien $bien): View
    {
        $this->authorize('view', $bien);

        return view('app.biens.show', compact('bien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Bien $bien): View
    {
        $this->authorize('update', $bien);

        $types = Type::pluck('designation', 'id');
        $users = User::pluck('nom_prenom', 'id');
        $modeles = Modele::pluck('designation', 'id');
        $marques = Marque::pluck('designation', 'id');

        return view(
            'app.biens.edit',
            compact('bien', 'types', 'users', 'modeles', 'marques')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        BienUpdateRequest $request,
        Bien $bien
    ): RedirectResponse {
        $this->authorize('update', $bien);

        $validated = $request->validated();

        $bien->update($validated);

        return redirect()
            ->route('biens.edit', $bien)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Bien $bien): RedirectResponse
    {
        $this->authorize('delete', $bien);

        $bien->delete();

        return redirect()
            ->route('biens.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
