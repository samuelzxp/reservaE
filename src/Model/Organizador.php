<?php
namespace Src\Model;

use Illuminate\Database\Eloquent\Model;

class Organizador extends Model {
    protected $table = 'organizadores';
    protected $fillable = ['usuario', 'nome', 'email', 'senha_hash', 'telefone', 'data_nascimento', 'nome_empresa', 'CNPJ', 'endereco', 'midias_sociais'];

    const CREATED_AT = 'created_at'; 
    const UPDATED_AT = 'updated_at'; 
}

