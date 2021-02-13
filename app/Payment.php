<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function restaurant() {
        return $this->belongsTo('App\Restaurant');
    }
    public function paymentMethods() {
        return $this->hasMany('App\Payment_method');
    }
    public function buyer() {
        return $this->belongsTo('App\Buyer');
    }
}
