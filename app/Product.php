<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function type() {
        return $this->hasOne('App\ProductType', 'id', 'prodtype');
    }

    public function package() {
        return $this->hasMany('App\ProductPackage', 'prodid', 'id');
    }

    public function seller() {
        return $this->hasOne('App\User', 'id', 'sellerid');
    }
}
