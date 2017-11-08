<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function scopeInCart($query)
   {
       return $query->where('in_cart', 1);
   }
}
