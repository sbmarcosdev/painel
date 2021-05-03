<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelaCiclo extends Model
{
    protected $guarded = [''];

    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id', 'empresa_id')->first();
    }

    public function tabela()
    {
        return $this->belongsTo(Tabela::class, 'tabela_id', 'id')->first();
    }
}
