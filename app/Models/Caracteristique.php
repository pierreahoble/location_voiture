<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Caracteristique extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['designation', 'valeur', 'bien_id'];

    protected $searchableFields = ['*'];

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
