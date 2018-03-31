<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class package extends Model
{
  protected $primaryKey = 'id';
protected $table = 'package';
protected $fillable = array(
  'item_id',
  'description',
  'price',
);
}
