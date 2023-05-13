<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bien extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'designation',
        'email',
        'telephone',
        'immatriculation',
        'prix_jour',
        'annee',
        'couleur',
        'type_consomation',
        'transmission',
        'conso_sur_cent',
        'moteur',
        'Nbre_porte',
        'Nbre_place',
        'Description',
        'type_id',
        'gerant_id',
        'modele_id',
        'marque_id',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class, 'gerant_id');
    }

    public function modele()
    {
        return $this->belongsTo(Modele::class);
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class);
    }

    public function caracteristiques()
    {
        return $this->hasMany(Caracteristique::class);
    }

    public function allMedia()
    {
        return $this->hasMany(Media::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
