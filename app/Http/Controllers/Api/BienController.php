<?php

namespace App\Http\Controllers\Api;

use App\Models\Bien;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\BienResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\BienCollection;
use App\Http\Requests\BienStoreRequest;
use App\Http\Requests\BienUpdateRequest;

class BienController extends Controller
{
    public function index(Request $request): BienCollection
    {
        $this->authorize('view-any', Bien::class);

        $search = $request->get('search', '');

        $biens = Bien::search($search)
            ->latest()
            ->paginate();

        return new BienCollection($biens);
    }

    public function store(BienStoreRequest $request): BienResource
    {
        $this->authorize('create', Bien::class);

        $validated = $request->validated();

        $bien = Bien::create($validated);

        return new BienResource($bien);
    }

    public function show(Request $request, Bien $bien): BienResource
    {
        $this->authorize('view', $bien);

        return new BienResource($bien);
    }

    public function update(BienUpdateRequest $request, Bien $bien): BienResource
    {
        $this->authorize('update', $bien);

        $validated = $request->validated();

        $bien->update($validated);

        return new BienResource($bien);
    }

    public function destroy(Request $request, Bien $bien): Response
    {
        $this->authorize('delete', $bien);

        $bien->delete();

        return response()->noContent();
    }
}
