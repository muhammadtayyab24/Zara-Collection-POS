<?php

namespace App\Http\Controllers\backend\order;

use App\Http\Controllers\Controller;
use App\Models\DailyRecord;
use App\Models\Deals;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index(){
        $product = Product::all();
        $seller = Employee::all();
        return view('backend.orders.order',['product'=>$product ,'seller'=>$seller]);
    }


    // getting price
    public function getProduct(Request $request) {
        $productId = $request->input('productId');
        $product = Product::find($productId);

        return response()->json([
            'id' => $product->id,
            'product_name' => $product->name,
            'price' => $product->price,
        ]);
    }

    public function store(Request $request){
        // return $request->all();
        DB::transaction(function() use ($request){

            // Check if an order with the given phone_no exists
    $existingOrder = Order::where('phone_no', $request->Customer_phone_no)->latest('id')->first();

    if ($existingOrder) {
        // Use the existing order's id
        $existingOrder->name = $request->Customer_name;
        // $existingOrder->address = $request->Customer_address;
        $existingOrder->save();
        $order_id = $existingOrder->id;
    } else {
        // Create a new order
        $order = new Order;
        $order->name = $request->Customer_name;
        $order->phone_no = $request->Customer_phone_no;
        // $order->address = $request->Customer_address;
        $order->save();
        $order_id = $order->id;
    }      

        $transaction = new Transaction;
        $transaction->admin_id = auth()->user()->id;
        $transaction->order_id = $order_id;
        $transaction->seller_id = $request->seller_id;
        $transaction->payment_method = $request->payment_method;
        $transaction->trans_amount = $request->trans_amount;
        $transaction->trans_date = date('y-m-d');
        $transaction->transaction_time = $transaction->created_at;  
        $transaction->save();
        for ($product_id=0; $product_id < count($request->product_id)  ; $product_id++) { 

            $product = Product::find($request->product_id[$product_id]);

            if ($product) {
                // Calculate profit for this product in the order
                $profit = ( $request->price[$product_id] - $product->price) * $request->quantity[$product_id];

                // Store the profit in a table
                DailyRecord::create([
                    'product_id' => $product->id,
                    'order_id' => $order_id,
                    'profit_amount' => $profit,
                    'date' => now(),
                ]);

                // ... Rest of your code ...

            $order_detail = new Order_Detail;
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $request->product_id[$product_id];
            // $order_detail->flavour_id = $request->flavour[$product_id] ?? 0;
            $order_detail->quantity = $request->quantity[$product_id] ?? 0;
            $order_detail->unitprice = $request->price[$product_id];
            $order_detail->amount = $request->total_amount[$product_id];
            // $order_detail->discount = $request->discount[$product_id];
            $order_detail->save();
            $order_detail->transaction_time = $transaction->created_at;
            $order_detail->save();
        }

            // Update product quantity in the products table
    $product = Product::find($request->product_id[$product_id]);

    if ($product) {
        // Check if there is enough quantity available
        if ($product->quantity < $order_detail->quantity) {
            // Handle insufficient quantity error as needed
            // You can return an error response or redirect back with an error message.
        } else {
            // Subtract the ordered quantity from the product's available quantity
            $product->quantity -= $order_detail->quantity;
            $product->save();
        }
    } else {
        // Handle product not found error as needed
        // You can return an error response or redirect back with an error message.
    }
        }
        

            session()->put('selectedProductOrDeal', $request->selectedProductOrDeal);
            // order history
            $product = Product::all();
            $order_detailss = Order_Detail::where('order_id',$order_id)->get();
            $orderBy = Order::where('id',$order_id)->get();
            return view('backend.orders.order',['product'=> $product,'order_details'=>$order_detailss ,'customer_orders'=>$orderBy]);
        });
       return redirect('admin/receipt')->with('product order faild to process');
    // dd(request()->all());
    
         
    }

    
    public function receipt(Request $request){
        $products = Product::all();
        // $deals = Deals::all();

    $latestTransaction = Transaction::latest()->first();

    if ($latestTransaction) {
        $transactionTime = $latestTransaction->created_at;
    
        $order_receipt = Order_Detail::where('order_id', $latestTransaction->order_id)
            ->where('transaction_time', $transactionTime)
            ->get();
    } else {
        // Handle the case when there are no transactions
        $order_receipt = [];
    }

        // getting current time 
        $currentTime = Carbon::now();
        // for get trans_amount fro transaction table
        $lastTransaction = Transaction::orderBy('id', 'desc')->first();
        // $lastorderstatus = Transaction::orderBy('id', 'desc')->first();
        $lastTransactionemp = Transaction::with('employee')->latest()->first();



    // Check if a transaction exists
    if ($lastTransaction) {
        $transAmount = $lastTransaction->trans_amount;
    } else {
        $transAmount = 0; // Default value if there are no transactions
    }

       return view('backend.orders.receipt',[
        'order_receipt'=>$order_receipt,
        'currentTime'=>$currentTime,
        'transAmount' => $transAmount,
        'lastTransaction' => $lastTransaction,
        'products'=> $products,
        'lastTransactionemp'=>$lastTransactionemp,
        // 'deals'=> $deals,

        ]);

      
   }

}
