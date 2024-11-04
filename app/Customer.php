<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $customer = "customers";
    public function bill(){
        return $this->belongsTo('App\Bill');
    }
}
