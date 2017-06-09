<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gbrock\Table\Traits\Sortable;
use EloquentFilter\Filterable as Filterable;


class Compra extends Model
{

   
    protected $table = "compras";
  
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    



    public function aeronave(){
        return $this->belongsTo('App\Aeronave', 'id_aeronave');        
    }

    public function comprador(){
        return $this->belongsTo('App\User', 'id_comprador');        
    }



}


