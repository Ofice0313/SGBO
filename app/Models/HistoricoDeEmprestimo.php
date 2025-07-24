<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoDeEmprestimo extends Model
{
    
    public function emprestimos(){
        return $this->hasMany(Emprestimo::class);
    }
}
