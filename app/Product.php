<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category() {
        return $this->belongTo('App\Category');
    }

    public function user() {
        return $this->belongTo('App\User');
    }

    public function orders() {
        return $this->belongsToMany('App\Order');
    }
}
