<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id')->first();
    }
    public function produto()
    {
        return $this->hasOne(Produto::class, 'id', 'produto_id')->first();
    }
}
