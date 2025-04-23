<?php
namespace Src\Model;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    protected $table = 'usuarios';
    protected $fillable = ['usuario', 'nome', 'email', 'senha_hash', 'data_nascimento'];

    const CREATED_AT = 'created_at'; 
    const UPDATED_AT = 'updated_at'; 
}
