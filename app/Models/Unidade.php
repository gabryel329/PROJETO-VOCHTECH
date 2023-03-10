<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;
    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj',
    ];

    public function funcionarios()
    {
        return $this->hasMany(Funcionarios::class);
    }
}
