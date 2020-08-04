<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    protected $table = 'oders';
    protected $fillable =['title','books','total'];
}
