<?php

namespace App\Models;

use App\Enums\StatusEmprestimo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{

     use HasFactory;
     
    protected $status_emprestimo = ['status_emprestimo' => StatusEmprestimo::class,];

    protected $table = 'emprestimos';

    protected $fillable = [
        'user_id',
        'material_id',
        'data_de_retirada',
        'data_de_devolucao',
        'data_limite',
        'nota_antes_do_emprestimo',
        'nota_apos_emprestimo',
        'notificacao',
        'status_emprestimo',
        'unidades',
        'multa',
        'created_at',
        'updated_at',
    ];
    
    public function historicoDeEmprestimos()
    {
        return $this->hasOne(HistoricoDeEmprestimo::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function usuario()
    {
        return $this->user();
    }
}
