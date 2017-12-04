<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function orderedProducts () 
    {
        return $this->hasMany(OrderedProduct::class);
    }
    
}
