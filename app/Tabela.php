<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabela extends Model
{
    protected $guarded = [''];

    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id', 'empresa_id')->first();
    }

    public function ciclos()
    {
        return $this->hasOne(TabelaCiclo::class, 'tabela_id', 'id')->first();
    }

    public function ordens()
    {
         return $this->hasMany(TabelaColuna::class);
    }

    public function colunas()
    {
        return $this->hasMany(TabelaColuna::class, 'id', 'tabela_id')->get();
    }
}
