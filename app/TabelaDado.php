<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelaDado extends Model
{
    protected $guarded = [''];

    public function dadosTabela()
    {
        return $this->hasOne(Tabela::class, 'id', 'tabela_id')->first();
    }
}
