<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'prodpackprice';
    protected $fillable = array(
        'prodid',
        'prodprice',
        'prodpack',
    );
}
