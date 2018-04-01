<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'buyerid', 'prodpackid', 'prodquantity',
    ];

    public function buyer() {
        return $this->hasOne('App\User', 'id', 'buyerid');
    }

    public function package() {
        return $this->hasOne('App\ProductPackage', 'id', 'prodpackid');
    }
}
