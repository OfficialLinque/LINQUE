<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = array(
        'prodname',
        'prodtotalquantity',
        'prodtype',
        'proddesc',
        'sellerid',
        'prodimg',
    );
}
