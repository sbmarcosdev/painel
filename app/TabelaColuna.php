<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelaColuna extends Model
{
    protected $guarded = [''];

    public function tabela()
    {
        return $this->belongsTo(Tabela::class, 'tabela_id', 'id')->first();
    }
}
