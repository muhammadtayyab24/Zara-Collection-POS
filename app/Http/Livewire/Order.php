<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Deals;
use App\Models\Employee;
use App\Models\Flavour;
use App\Models\Order as ModelsOrder;
use App\Models\Product;
use Livewire\Component;

class Order extends Component
{
    public $order,$products  ,$employee= [];
    public $deals;
    public $selectedProductId;
    public $selectedProductPrice;
    protected $productData = [];
    public $priceInput = 0;
    public $quantity = 0;
    public $priceInputs = [];
    public $selectedProductPricet = '0.00';
    public $selectedId;

    public $selectedProductOrDeal;
public $selectedPrice;
public $selectedProductName;

// public function updatedSelectedProductOrDeal()
// {
//     // Split the selected value into type (product or deal) and ID
//     list($type, $id) = explode('0', $this->selectedProductOrDeal);

//     if ($type === '1') {
//         $product = Product::find($id);
//         $this->selectedProductPrice = $product->price;
//         $this->selectedProductName = $product->product_name;

//     } elseif ($type === '2') {
//         $deal = Deals::find($id);
//         $this->selectedProductPrice = $deal->price;
//         $this->selectedProductName = $deal->name; 
//     }
// }


    public function mount(){
        // $this->product = Product::get();
        $this->products = Product::all(['id', 'product_name', 'price']);
        $this->deals = Deals::all();
        $this->employee = Employee::all();
    }
    public function render()
    {
     
        return view('livewire.order');  
    
    }

    public function updatedSelectedProductId()
    {
        // Fetch the price of the selected product
        $product = Product::find($this->selectedProductId);
        $this->selectedProductPrice = $product->price;

        // Store product data for calculations
        $this->productData[$this->selectedProductId] = $product->price;
    }

    public function getProductPrice($productId)
{
    // Fetch the product price based on $productId
    $product = Product::find($productId);
    $product = Deals::find($productId);

    if ($product) {
        return $product->price;
    }

    return 0; // Return a default value if the product is not found
    
}
    public function updatedQuantity()
    {
        $this->priceInput = $this->selectedProductPrice * $this->quantity;
    }

// total price display
    public function updatedPriceInput($value)
    {
        $this->emit('updatePriceInput', $this->priceInput);
    }


}
