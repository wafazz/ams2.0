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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('order_by');
            $table->integer('role');
            $table->text('network');
            $table->string('cart_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('postcode');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->integer('quantity')->default(0);
            $table->integer('order_type')->comment('1-Normal, 2-COD, 3-Self Collect');
            $table->float('postage_cost', 10, 2);
            $table->float('cod_cost', 10, 2);
            $table->float('order_amount', 10, 2);
            $table->float('discount', 10, 2);
            $table->float('add_on_charge', 10, 2);
            $table->float('tax', 10, 2);
            $table->string('courier_service');
            $table->string('awb');
            $table->string('tracking_url');
            $table->integer('status')->default(0)->comment('0-pending, 1-new, 2-process, 3-COD In Progress, 4-Normal In Progress, 5-Complted, 6-Return, 7-cancel');
            $table->string('order_note', 1500);
            $table->string('delivery_note', 1500);
            $table->float('currency_rate', 10, 2);
            $table->integer('payment_type')->default(0)->comment('0-FPX, 1-upload receipt, 2-cod');
            $table->string('payment_code')->nullable();
            $table->string('payment_url_image')->nullable();
            $table->integer('platform')->nullable();
            $table->float('platform_price', 10, 2)->default(0.00);
            $table->integer('awb_status')->default(0)->comment('0-not print yet, 2-already printed, 3-reprint');
            $table->timestamp('soft_delete')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
