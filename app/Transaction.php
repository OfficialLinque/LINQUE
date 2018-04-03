<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table = 'transactions';
    protected $fillable = [
        'transid','buyerid', 'prodprice', 'prodquantity','sellerid','prodpack','prodid','sellerid'
    ];

    public function product() {
        return $this->hasMany('App\Product', 'id', 'prodid');
    }
    
    public function seller() {
        return $this->hasOne('App\User', 'id', 'sellerid');
    }

    
}
