<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    public function payments() {
        return $this->hasMany('App\Payment');
    }
}
