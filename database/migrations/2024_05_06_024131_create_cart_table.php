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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('cart_id');
            $table->integer('variation')->default(0);
            $table->integer('product_id')->nullable();
            $table->string('product_name')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('unit_weight')->default(0);
            $table->integer('total_weight')->default(0);
            $table->float('unit_price', 10, 2)->nullable();
            $table->float('total_unit_price', 10, 2)->nullable();
            $table->float('capital_price', 10, 2)->nullable();
            $table->float('total_capital_price', 10, 2)->nullable();
            $table->float('retail_price', 10, 2)->nullable();
            $table->float('total_retail_price', 10, 2)->nullable();
            $table->integer('status')->default(0);
            $table->integer('combo')->default(0);
            $table->string('network_tree', '1500')->nullable();
            $table->timestamp('soft_delete')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
