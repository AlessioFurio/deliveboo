<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    public function payments() {
        return $this->hasMany('App\Payment');
    }
}
