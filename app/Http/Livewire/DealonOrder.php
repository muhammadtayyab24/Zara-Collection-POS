<?php

namespace App\Http\Livewire;

use App\Models\Deals;
use Livewire\Component;

class DealonOrder extends Component
{
    public $deals;

    public function mount(){
        // $this->product = Product::get();
        $this->deals = Deals::all();
    }
    public function render()
    {
        return view('livewire.dealon-order');
    }
    
}
