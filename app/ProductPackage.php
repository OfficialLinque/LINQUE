<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{
    protected $table = 'prodpackprice';

    public function product() {
        return $this->hasMany('App\Product', 'id', 'prodid');
    }
}
