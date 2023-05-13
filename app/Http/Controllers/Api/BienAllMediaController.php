<?php

namespace App\Http\Controllers\Api;

use App\Models\Bien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Http\Resources\MediaCollection;

class BienAllMediaController extends Controller
{
    public function index(Request $request, Bien $bien): MediaCollection
    {
        $this->authorize('view', $bien);

        $search = $request->get('search', '');

        $allMedia = $bien
            ->allMedia()
            ->search($search)
            ->latest()
            ->paginate();

        return new MediaCollection($allMedia);
    }

    public function store(Request $request, Bien $bien): MediaResource
    {
        $this->authorize('create', Media::class);

        $validated = $request->validate([
            'type' => ['required', 'max:20', 'string'],
            'lien' => ['required', 'max:255', 'string'],
        ]);

        $media = $bien->allMedia()->create($validated);

        return new MediaResource($media);
    }
}
