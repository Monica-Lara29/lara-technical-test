<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{

    protected $fillable = ['catalog_id', 'reference_code', 'state','section_id','library_id','acquisition_date'];

    public function section()
    {
        return $this->belongsTo(Section::class); // Un ejemplar pertenece a una sección
    }

    
    public function material()
    {
        return $this->belongsTo(Material::class, 'catalog_id');
    }
}
