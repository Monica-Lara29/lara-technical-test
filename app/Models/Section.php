<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    
    protected $fillable = ['name', 'library_id', 'description'];
    
    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function exemplars()
    {
        return $this->hasMany(Exemplar::class);  // Relación con ejemplares
    }
}
