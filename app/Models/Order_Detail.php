<?php

namespace App\Models;

use App\Models\Flavour;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    public $table = "order__details";
    protected $fillable = ['order_id','product_id','quantity','unitprice','amount','transaction_time'];


    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function deals(){
        return $this->belongsTo(Deals::class);
    }
    // public function flavour()
    // {
    //     return $this->belongsTo(Flavour::class, 'flavour_id', 'id');
    // }
    // Define relationship with the Order model
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Order_Detail.php model
public function transaction()
{
    return $this->belongsTo(Transaction::class, 'order_id'); // Use the correct foreign key
}

}
