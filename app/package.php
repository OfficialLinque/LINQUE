<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
protected $primaryKey = 'id';
protected $table = 'prodpackprice';
protected $fillable = array(
  'prodid',
  'prodprice',
  'prodpack',
);
}
