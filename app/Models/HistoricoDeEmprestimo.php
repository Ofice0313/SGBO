<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoDeEmprestimo extends Model
{

     use HasFactory;
    
    protected $fillable = ['observacao'];

    public function emprestimos(){
        return $this->belongsTo(Emprestimo::class);
    }
}
