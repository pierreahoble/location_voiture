<?php

namespace App\Http\Controllers\Api;

use App\Models\Bien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentaireResource;
use App\Http\Resources\CommentaireCollection;

class BienCommentairesController extends Controller
{
    public function index(Request $request, Bien $bien): CommentaireCollection
    {
        $this->authorize('view', $bien);

        $search = $request->get('search', '');

        $commentaires = $bien
            ->commentaires()
            ->search($search)
            ->latest()
            ->paginate();

        return new CommentaireCollection($commentaires);
    }

    public function store(Request $request, Bien $bien): CommentaireResource
    {
        $this->authorize('create', Commentaire::class);

        $validated = $request->validate([
            'nom_prenom' => ['required', 'max:255', 'string'],
            'email' => ['nullable', 'email'],
            'telephone' => ['nullable', 'max:255', 'string'],
            'message' => ['required', 'max:255', 'string'],
        ]);

        $commentaire = $bien->commentaires()->create($validated);

        return new CommentaireResource($commentaire);
    }
}
