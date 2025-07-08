<?php

namespace App\Models;

use App\Enums\Instituicao;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $instituicao = ['instituicao' => Instituicao::class,];

    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
        'email',
        'status',
        'password',
    ];
}
