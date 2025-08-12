<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlinePayment extends Model
{
    use HasFactory;
    public $table = "online_payment";
    protected $fillable = ['payment_system','sender','receiver','amount'];

}
