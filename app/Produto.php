<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\produto;


class Produto extends Model
{
    public function categoria(){
        return $this->belongsTo('App\Categoria','id_categoria');
    }

    
}
