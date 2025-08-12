<?php

use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\Customer\CustomerController;
use App\Http\Controllers\backend\DailyRecordController;
use App\Http\Controllers\backend\DealsController;
use App\Http\Controllers\backend\EmpabsenseController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\ErrorController;
use App\Http\Controllers\backend\ExpenseController;
use App\Http\Controllers\backend\FaqController;
use App\Http\Controllers\backend\FlavourController;
use App\Http\Controllers\backend\FormsController;
use App\Http\Controllers\backend\IndexController;
use App\Http\Controllers\backend\LoginController;
use App\Http\Controllers\backend\OnlinePaymentController;
use App\Http\Controllers\backend\product\productController;
use App\Http\Controllers\backend\RegisterController;
use App\Http\Controllers\backend\TableDataController;
use App\Http\Controllers\backend\TransactionController;
use App\Http\Controllers\backend\UserProfileController;
use App\Http\Controllers\backend\order\OrderController;
use App\Http\Controllers\backend\SaleController;
use App\Http\Controllers\backend\StockBalanceController;
use App\Http\Controllers\backend\StockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('welcome', function () {
    return view('welcome');
});

// authentication
Route::get('/',[LoginController::class,'index'])->name("login");
Route::get('register',[RegisterController::class,'index']);
Route::get('logout',[RegisterController::class,'logout']);
Route::post('signup',[RegisterController::class,'signup']);
Route::post('login',[LoginController::class,'login']);





Route::middleware(['auth', 'verified'])->prefix('/admin')->group(function(){
    Route::get('dashboard',[IndexController::class,'index']);
    Route::get('contact',[ContactController::class,'index']);
    Route::get('login',[LoginController::class,'index']);
    Route::get('register',[RegisterController::class,'index']);
    Route::get('tabledata',[TableDataController::class,'index']);
    Route::get('userprofile',[UserProfileController::class,'index']);
    Route::get('faq',[FaqController::class,'index']); 
    Route::get('/getRevenueData', 'IndexController@getRevenueData');




    // CRUD of admin
    Route::get('adduser',[FormsController::class,'index']);
    Route::post('saveuser',[FormsController::class,'saveuser']);
    Route::get('edituseris/{id}',[TableDataController::class,'edituser']);
    Route::get('deleteuser/{id}',[TableDataController::class,'deleteuser']);
    Route::post('updateuser',[TableDataController::class,'updateuser']);

    Route::get('edituser/{id}',[UserProfileController::class,'edituser']);
    Route::post('updatePassword',[UserProfileController::class,'updatePassword'])->name('updatePassword');
    Route::post('updateUser',[UserProfileController::class,'updateUser'])->name('updateUser');

    

      // CRUD of product
      Route::get('product',[productController::class,'index']);
      Route::get('addproduct',[productController::class,'addproduct']);   
      Route::post('saveproduct',[productController::class,'saveproduct']);
      Route::get('editproduct/{id}',[productController::class,'editproduct']);
      Route::get('deleteproduct/{id}',[productController::class,'deleteproduct']);
      Route::post('updateproduct',[productController::class,'updateproduct']);
      Route::get('getProduct',[OrderController::class,'getProduct']);

      // CRUD of Stock
      Route::get('stock',[StockController::class,'index']);
      Route::get('addstock',[StockController::class,'addstock']);   
      Route::post('savestock',[StockController::class,'savestock']);
      Route::get('editstock/{id}',[StockController::class,'editstock']);
      Route::get('deletestock/{id}',[StockController::class,'deletestock']);
      Route::post('updatestock',[StockController::class,'updatestock']);
      Route::get('getProduct',[OrderController::class,'getProduct']);

      // CRUD of employee
      Route::get('employee',[EmployeeController::class,'index']);
      Route::get('addemployee',[EmployeeController::class,'addemployee']);   
      Route::post('saveemployee',[EmployeeController::class,'saveemployee']);
      Route::get('editemployee/{id}',[EmployeeController::class,'editemployee']);
      Route::get('deleteemployee/{id}',[EmployeeController::class,'deleteemployee']);
      Route::post('updateemployee',[EmployeeController::class,'updateemployee']);
      Route::get('getemployee',[OrderController::class,'getemployee']);
      



       // CRUD of customer
       Route::get('customer',[CustomerController::class,'index']);
       Route::get('addcustomer',[CustomerController::class,'addcustomer']);   
       Route::post('savecustomer',[CustomerController::class,'savecustomer']);
       Route::get('editcustomer/{id}',[CustomerController::class,'editcustomer']);
       Route::get('deletecustomer/{id}',[CustomerController::class,'deletecustomer']);
       Route::post('updatecustomer',[CustomerController::class,'updatecustomer']);


        // CRUD of order
        Route::get('order',[OrderController::class,'index']);
        Route::post('storeorder',[OrderController::class,'store']);
        Route::get('receipt',[OrderController::class,'receipt']);
        Route::get('transactions',[TransactionController::class,'index']);
        


        // //  CRUD  OF deal
        Route::get('expense',[ExpenseController::class,'index']);
        Route::get('addexpense',[ExpenseController::class,'addexpense']);
        Route::post('saveexpense',[ExpenseController::class,'saveexpense']);
        // Route::get('fetchDailyExpenses',[ExpenseController::class,'fetchDailyExpenses']);
        // Route::get('deletedeal/{id}',[DealsController::class,'deletedeal']);
        // Route::post('updatedeal',[DealsController::class,'updatedeal']);

        // sale
        Route::get('sale',[SaleController::class,'index']);
        Route::get('deletesale/{id}',[SaleController::class,'deletesale']);


        //CRUD of Flavour

      Route::get('flavour',[FlavourController::class,'index']);
      Route::get('addflavour',[FlavourController::class,'addflavour']);   
      Route::post('saveflavour',[FlavourController::class,'saveflavour']);
      Route::get('editflavour/{id}',[FlavourController::class,'editflavour']);
      Route::get('deleteflavour/{id}',[FlavourController::class,'deleteflavour']);
      Route::post('updateflavour',[FlavourController::class,'updateflavour']);


      // stock balance
      Route::get('stock-balance',[StockBalanceController::class,'index']);
      Route::post('save-balance',[StockBalanceController::class,'savebalance']);
      Route::get('editbalance/{id}',[StockBalanceController::class,'editbalance']);
      Route::get('deletebalance/{id}',[StockBalanceController::class,'deletebalance']);
      Route::post('updatebalance',[StockBalanceController::class,'updatebalance']);

       // Online Payment
       Route::get('onlinePayment',[OnlinePaymentController::class,'index']);
       Route::post('save-onlinePayment',[OnlinePaymentController::class,'saveonlinePayment']);
       Route::get('editonlinePayment/{id}',[OnlinePaymentController::class,'editonlinePayment']);
       Route::get('deleteonlinePayment/{id}',[OnlinePaymentController::class,'deleteonlinePayment']);
       Route::post('updateonlinePayment',[OnlinePaymentController::class,'updateonlinePayment']);

         // Daily Record
         Route::get('dailyRecord',[DailyRecordController::class,'index']);

         // employee absense

         Route::get('empAbsense',[EmpabsenseController::class,'index']);
         Route::post('save-empAbsense',[EmpabsenseController::class,'saveempAbsense']);
       Route::get('editempAbsense/{id}',[EmpabsenseController::class,'editempAbsense']);
       Route::get('deleteempAbsense/{id}',[EmpabsenseController::class,'deleteempAbsense']);
       Route::post('updateempAbsense',[EmpabsenseController::class,'updateempAbsense']);

    
});

