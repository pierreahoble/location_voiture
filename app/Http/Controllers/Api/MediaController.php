<?php

namespace App\Http\Controllers\Api;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\MediaResource;
use App\Http\Resources\MediaCollection;
use App\Http\Requests\MediaStoreRequest;
use App\Http\Requests\MediaUpdateRequest;

class MediaController extends Controller
{
    public function index(Request $request): MediaCollection
    {
        $this->authorize('view-any', Media::class);

        $search = $request->get('search', '');

        $allMedia = Media::search($search)
            ->latest()
            ->paginate();

        return new MediaCollection($allMedia);
    }

    public function store(MediaStoreRequest $request): MediaResource
    {
        $this->authorize('create', Media::class);

        $validated = $request->validated();

        $media = Media::create($validated);

        return new MediaResource($media);
    }

    public function show(Request $request, Media $media): MediaResource
    {
        $this->authorize('view', $media);

        return new MediaResource($media);
    }

    public function update(
        MediaUpdateRequest $request,
        Media $media
    ): MediaResource {
        $this->authorize('update', $media);

        $validated = $request->validated();

        $media->update($validated);

        return new MediaResource($media);
    }

    public function destroy(Request $request, Media $media): Response
    {
        $this->authorize('delete', $media);

        $media->delete();

        return response()->noContent();
    }
}
