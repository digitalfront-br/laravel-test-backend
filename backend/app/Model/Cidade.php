<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'uf', 'codigo_uf');
    }
}
