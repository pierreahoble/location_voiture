<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Media;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MediaStoreRequest;
use App\Http\Requests\MediaUpdateRequest;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Media::class);

        $search = $request->get('search', '');

        $allMedia = Media::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.all_media.index', compact('allMedia', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Media::class);

        $biens = Bien::pluck('designation', 'id');

        return view('app.all_media.create', compact('biens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MediaStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Media::class);

        $validated = $request->validated();

        $media = Media::create($validated);

        return redirect()
            ->route('all-media.edit', $media)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Media $media): View
    {
        $this->authorize('view', $media);

        return view('app.all_media.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Media $media): View
    {
        $this->authorize('update', $media);

        $biens = Bien::pluck('designation', 'id');

        return view('app.all_media.edit', compact('media', 'biens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        MediaUpdateRequest $request,
        Media $media
    ): RedirectResponse {
        $this->authorize('update', $media);

        $validated = $request->validated();

        $media->update($validated);

        return redirect()
            ->route('all-media.edit', $media)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Media $media): RedirectResponse
    {
        $this->authorize('delete', $media);

        $media->delete();

        return redirect()
            ->route('all-media.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
