<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_Detail;

class Transaction extends Model
{
    use HasFactory;

    public $table = "transactions";
    protected $fillable = ['order_id','admin_id','trans_date','trans_amount','seller_id','transaction_time','payment_method'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'admin_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    // Transaction.php model
    public function orderDetail()
    {
        return $this->hasOne(Order_Detail::class, 'order_id'); // Use the correct foreign key
    }

    public function employee(){
        return $this->belongsTo(Employee::class, 'seller_id');
    }

    
}
