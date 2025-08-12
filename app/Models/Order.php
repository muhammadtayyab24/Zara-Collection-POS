<?php

namespace App\Models;

use App\Models\Order_Detail;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public $table = "orders";
    protected $fillable = ['name','phone_no'];

    
public function orderDetail() {
    return $this->hasMany(Order_Detail::class);
}

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'order_id', 'id');
    }
}
