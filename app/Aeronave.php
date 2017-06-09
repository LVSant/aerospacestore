<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gbrock\Table\Traits\Sortable;
use EloquentFilter\Filterable as Filterable;


class Aeronave extends Model
{

    use Filterable;

    protected $table = "aeronaves";
  
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    


    public function modelFilter()
    {
        return $this->provideFilter(ModelFilters\AeronaveFilter::class);
    }

    
	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modelo', 'descricao', 'valor', 'ano',
    ];

    public function vendedor(){
        return $this->belongsTo('App\User', 'user_id');
    }


   
     

}


