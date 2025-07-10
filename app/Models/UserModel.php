<?php

namespace App\Models;

use App\Enums\Instituicao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserModel extends Model
{

    use SoftDeletes;

    protected $table = 'usuarios';

    protected $instituicao = ['instituicao' => Instituicao::class,];

    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
        'email',
        'status',
        'password',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_usuario', 'usuario_id', 'role_id');
    }
 }
