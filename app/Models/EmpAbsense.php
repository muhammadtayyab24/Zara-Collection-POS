<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpAbsense extends Model
{
    use HasFactory;
    public $table = "employeeabsense";
    protected $fillable = ['employee_id','absense','date'];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
