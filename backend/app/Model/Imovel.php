<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = "imoveis";

    protected $fillable = ['email', 'bairro', 'cidade', 'complemento', 'estado', 'numero', 'rua', 'cidade_id'];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
