<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producttypes extends Model
{
  protected $primaryKey = 'prodid';
protected $table = 'producttypes';
protected $fillable = array(
  'prodtype',

);
}