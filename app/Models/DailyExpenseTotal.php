<?php

namespace App\Models;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyExpenseTotal extends Model
{
    use HasFactory;
    public $table = "expense_total";
    protected $fillable = ['total_amount','expense_date'];

    
    public function expenses()
    {
        return $this->hasMany(Expense::class, 'expense_date', 'expense_date');
    }
}
