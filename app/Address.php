<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = ['fullname','country','address','email','payment_type','user_id','orders_id','zip_code'];
}
