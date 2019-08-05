<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    //

    protected $table = 'submenu';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['pro_id','name'];
}
