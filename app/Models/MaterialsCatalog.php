<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MaterialsCatalog extends Model
{
    protected $fillable = [
        'title',
        'type',
        'isbn',
        'issn',
        'description',
        'reference_value',
        'updated_at',
        'created_at',
    ];
    //
    public function exemplars()
    {
        return $this->hasMany(Exemplar::class, 'catalog_id');
    }
}
