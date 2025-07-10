<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['autorizacao'];

    public function usuarios()
    {
        return $this->belongsToMany(UserModel::class, 'role_usuario', 'role_id', 'usuario_id');
    }
}
