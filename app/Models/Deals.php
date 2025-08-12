<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    public $table = "deals";
    protected $fillable = ['name','product_id','quantity','price'];

     public function orderDetail(){
        return $this->hasMany('App\Order_Detail');
    }
}
