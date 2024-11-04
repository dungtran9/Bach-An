<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public function bills(){
        return $this->belongsToMany('App\Bill','details','product_id','bill_id');
    }
}
