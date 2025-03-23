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
        Schema::create('clients_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idClients');
            $table->unsignedBigInteger('idProducts');

            $table->foreign('idClients')->references('idClient')->on('clients');
            $table->foreign('idProducts')->references('idProduct')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_product');
    }
};
