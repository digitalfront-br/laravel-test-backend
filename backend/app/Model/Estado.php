<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function cidades()
    {
        return $this->hasMany(Cidade::class);
    }
}
