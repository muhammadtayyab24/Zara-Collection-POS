<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyRecord extends Model
{
    use HasFactory;
    public $table = "daily_record";
    protected $fillable = ['date','product_id','order_id','profit_amount'];
}
