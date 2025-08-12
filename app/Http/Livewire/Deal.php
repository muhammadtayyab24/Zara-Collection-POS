<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;

class Deal extends Component
{
    public $items = [];
    public $product = [];
    public $selectedProductId;

    public function addItem()
    {
        $this->items[] = count($this->items) + 1;
        
    }

    public function mount(){
        $this->product = Product::all();

    }

    public function render()
    {
        
        return view('livewire.deal');
    }
}
