<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['type', 'lien', 'bien_id'];

    protected $searchableFields = ['*'];

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }
}
