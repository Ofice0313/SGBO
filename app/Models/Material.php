<?php

namespace App\Models;

use App\Enums\StatusMaterial;
use App\Enums\TipoDeMaterial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{

    use HasFactory, SoftDeletes;

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
        'caminho_do_audio',
        'caminho_do_arquivo',
        'status_material',
        'is_active',
        'subcategoria_id',
        'minutos'
    ];
    
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'emprestimos');
    }

     protected $casts = [
        'is_active' => 'boolean',
        'paginas' => 'integer',
        'minutos' => 'integer'
    ];


    public function hasPdf(): bool
    {
        return !empty($this->caminho_do_arquivo) && file_exists(storage_path('app/public/books/' . $this->caminho_do_arquivo));
    }

    public function hasAudio(): bool
    {
        return !empty($this->caminho_do_audio) && file_exists(storage_path('app/private/audiobooks/' . $this->caminho_do_audio));
    }


    public function getPdfUrl(): string
    {
        return asset('storage/books/' . $this->caminho_do_arquivo);
    }

    public function getAudioUrl(): string
    {
        return route('books.stream-audio', $this->id);
    }
}
