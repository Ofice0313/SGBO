<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    
    public function historicoDeEmprestimos()
    {
        return $this->belongsTo(HistoricoDeEmprestimo::class);
    }
}
