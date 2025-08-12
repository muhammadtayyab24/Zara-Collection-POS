<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EmployeeSales extends Component
{
    public $commissionPercentage = 10;
    public $totalSales = 0;
    public function render()
    {
        $commissionPercentage = (float)$this->commissionPercentage;
        $totalSales = (float)$this->totalSales;
 // Calculate commission deduction
 $commissionDeduction = $totalSales * ($commissionPercentage / 100);

 // Emit a Livewire event to update the commission deduction in real-time
 $this->emit('commissionPercentageUpdated', $commissionDeduction);

        return view('livewire.employee-sales', [
            'commissionDeduction' => $commissionDeduction,]);
    }
}
