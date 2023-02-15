<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'email',
        'idade',
        'documento',
        'unidade_id',
        'endereco_id'

    ];

    public function unidades()
    {
        return $this->belongsTo(Unidade::class);
    }

    public function enderecos()
    {
        return $this->belongsTo(Endereco::class);
    }
}
