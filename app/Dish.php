<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Dish extends Model
{
    protected $fillable = ['name', 'ingredients', 'price', 'visibility', 'course_id', 'restaurant_id','cover'];

    public function restaurant() {
        return $this->belongsTo('App\Restaurant');
    }
    public function course() {
        return $this->belongsTo('App\Course');
    }
}
