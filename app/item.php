<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
  protected $primaryKey = 'prodid';
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
