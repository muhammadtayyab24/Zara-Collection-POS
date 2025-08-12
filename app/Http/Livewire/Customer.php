<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Order;
use Livewire\Component;

class Customer extends Component
{
    public $phone_number ,$employee;
    public $name;
    public $address;

    
    public function updatedPhoneNumber()
    {
        $customer = Order::where('phone_no', $this->phone_number)->first();

        if ($customer) {
            $this->name = $customer->name;
            $this->address = $customer->address;
        } else {
            $this->name = '';
            $this->address = '';
        }
    }
    public function render()
    {
        $this->employee = Employee::all();

        return view('livewire.customer');
    }
}
