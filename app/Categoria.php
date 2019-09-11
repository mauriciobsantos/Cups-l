<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Categoria extends Model
{
    public function produtos(){
        return $this->hasMany('App\Produto','id_categoria');
    }
}
