<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Droploc extends Model
{
    //
    protected $table = 'droplocs';
    protected $fillable = ['name','address','city','state','hours','latitude','longitude'];
}
