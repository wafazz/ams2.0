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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('have_variation')->default(0);
            $table->string('sku');
            $table->string('product_name');
            $table->string('product_image', 1500);
            $table->float('weight', 10, 2);
            $table->float('length', 10, 2);
            $table->float('width', 10, 2);
            $table->float('height', 10, 2);
            $table->float('capital_price', 10, 2);
            $table->float('retail_price', 10, 2);
            $table->integer('role_4');
            $table->integer('role_5');
            $table->integer('role_6');
            $table->integer('role_7');
            $table->integer('role_8');
            $table->integer('role_9');
            $table->integer('role_10');
            $table->integer('role_11');
            $table->integer('role_12');
            $table->integer('role_13');
            $table->integer('category');
            $table->integer('brand');
            $table->text('assigned_user');
            $table->rememberToken();
            $table->timestamp('soft_delete')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
