<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
  protected $primaryKey = 'id';
protected $table = 'items';
protected $fillable = array(
  'name',
  'quantity',
  'prod_type',
  'img',
);
}
