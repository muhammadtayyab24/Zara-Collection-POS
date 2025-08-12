<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('acc_balance', function (Blueprint $table) {
            $table->id();
            $table->string('stock_name');
            $table->string('dealer_name'); 
            $table->integer('total_amount');
            $table->integer('clear_amount');
            $table->integer('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acc_balance');
    }
};
