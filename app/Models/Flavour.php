<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    use HasFactory;

    public $table = "flavour";
    protected $fillable = ['flavour_name'];

    // public function orderDetail()
    // {
    //     return $this->hasMany(Order_Detail::class, 'flavour_id', 'id');
    // }
}
