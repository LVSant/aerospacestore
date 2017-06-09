<?php 
namespace App\ModelFilters;

use EloquentFilter\ModelFilter;


class AeronaveFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relatedModel => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

 
    public function modelo($modelo)
    {
        return $this->where(function($q) use ($modelo)
        {
            return $q->where('modelo', 'LIKE', "%$modelo%")
                ->orWhere('descricao', 'LIKE', "%$modelo%");
        });
    }



   public function preco($preco)
    {
        return $this->where(function($q) use ($preco)
        {
            return $q->where('valor', '<=', "$preco");
        });
    }

    public function ano($ano)
    {
        return $this->where(function($q) use ($ano)
        {
            return $q->where('ano', '>=', "$ano");
        });
    }



    public function tipomotor($tipomotor)
    {
        return $this->where(function($q) use ($tipomotor)
        {
            return $q->where('tipomotor', 'like', "$tipomotor");
        });
    }

    public function numeromotor($numeromotor)
    {
        return $this->where(function($q) use ($numeromotor)
        {
            return $q->where('numeromotor', '=', "$numeromotor");
        });
    }
/*
    public function mobilePhone($phone)
    {
        return $this->where('mobile_phone', 'LIKE', "$phone%");
    }

    public function setup()
    {
        $this->onlyShowDeletedForAdmins();
    }
*/
    

}
