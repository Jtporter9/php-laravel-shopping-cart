<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedProduct extends Model
{
    
    public function orderedProduct ()
    {
        return $this->belongsTo(Order::class);
    }

}
