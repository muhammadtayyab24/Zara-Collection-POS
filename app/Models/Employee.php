<?php

namespace App\Models;

use App\Models\EmpAbsense;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $table = "employees";
    protected $fillable = ['employee_name','phone_no','commission','salary'];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class ,'seller_id','id'); // Use the correct foreign key
    }
    public function absences()
    {
        return $this->hasMany(EmpAbsense::class, 'employee_id');
    }
    
}
