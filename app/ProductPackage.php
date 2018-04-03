<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{
    protected $table = 'prodpackprice';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prodid', 'prodprice', 'prodpack',
    ];

    public function product() {
        return $this->hasMany('App\Product', 'id', 'prodid');
    }
}
