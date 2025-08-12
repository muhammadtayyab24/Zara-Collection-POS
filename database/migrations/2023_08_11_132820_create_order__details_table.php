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
        Schema::create('order__details', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('product_id');
            // $table->integer('flavour_id')->default('0');
            $table->integer('quantity');
            $table->integer('unitprice');
            $table->integer('amount');
            $table->timestamp('transaction_time')->nullable();
            // $table->integer('discount')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order__details');
    }
};
