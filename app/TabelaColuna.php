<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelaColuna extends Model
{
    protected $guarded = [''];
    
    public function tabela()
    {
        return $this->belongsTo(Tabela::class, 'id', 'tabela_id')->first();
    }
}
