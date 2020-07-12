<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = "imoveis";

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
