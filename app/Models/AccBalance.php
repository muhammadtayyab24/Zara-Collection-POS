<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccBalance extends Model
{
    use HasFactory;

    public $table = "acc_balance";
    protected $fillable = ['stock_name','dealer_name','total_amount','clear_amount','pending'];
}
