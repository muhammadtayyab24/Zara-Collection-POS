<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Sale extends Component
{
 
    // public $selectedYear;
    // public $selectedMonth;
    // public $selectedTransactions = [];
    // public $selectedTransactionsCollection = [];

    // public $transactions;






    public function render()
    {
        $transactions = Transaction::get();
        // $years = Transaction::selectRaw('YEAR(created_at) as year')->groupBy('year')->get();
        // $months = Transaction::selectRaw('MONTH(created_at) as month')->groupBy('month')->get();
        return view('livewire.sale');
    }

        // public function showTransactions()
        // {
        //     $currentYear = Carbon::now()->year;
        //     // $this->transactions = Transaction::whereYear('created_at', $this->selectedYear)->get();
        //     $this->transactions  = Transaction::whereYear('created_at', $currentYear)->get();

        // }
}
