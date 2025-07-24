<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    
    public function subcategorias()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'emprestimos');
    }
}
