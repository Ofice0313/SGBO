<?php

namespace App\Models;

use App\Enums\StatusMaterial;
use App\Enums\TipoDeMaterial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    use HasFactory;

    protected $table = 'materiais';

    protected $tipo = [
        'tipo' => TipoDeMaterial::class,
    ];

    protected $status_material = ['status_material' => StatusMaterial::class,];

    protected $fillable = [
        'titulo',
        'tipo',
        
        'status',
        'autor',
        'editora',
        'ano_de_publicacao',
        'paginas',
        'caminho_da_imagem',
        'caminho_do_arquivo',
        'status_material',
    ];
    
    public function subcategorias()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'emprestimos');
    }
}
