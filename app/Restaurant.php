<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'address', 'phone' , 'cover'
    ];

    public function user() {

        return $this->belongsTo('App\User');
    }

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

    public function dishes() {
        return $this->hasMany('App\Dish')->orderBy('name');
    }

    public function payments() {
        return $this->hasMany('App\Payment');
    }
    //commento


}
