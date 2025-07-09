<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = ['nome'];

    public function usuarios()
    {
        return $this->hasMany(UserModel::class, 'curso_id');
    }
}
