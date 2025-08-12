<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = "products";
    protected $fillable = ['product_name','price','quantity'];

    public function orderDetail(){
        return $this->hasMany('App\Order_Detail');
    }
    public function orders()
    {
        return $this->hasMany(Order::class); // Assuming your order model name is 'Order'
    }
}
