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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('idOrderDetails');
            $table->integer('quantity');
            $table->unsignedBigInteger('idProducts');
            $table->unsignedBigInteger('idOrder');
            $table->unsignedBigInteger('idOrderDetailsStatus');

            $table->foreign('idProducts')->references('idProduct')->on('products');
            $table->foreign('idOrder')->references('idOrder')->on('orders');
            $table->foreign('idOrderDetailsStatus')->references('idOrderDetailsStatus')->on('order_details_status');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
