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
        Schema::create('billplz', function (Blueprint $table) {
            $table->id();
            $table->string('sandbox_production');
            $table->string('sand_box_url');
            $table->string('production_url');
            $table->string('sb_api_key');
            $table->string('api_key');
            $table->string('x_signature');
            $table->string('sb_x_signature');
            $table->string('bill_collection_id');
            $table->string('sb_bill_collection_id');
            $table->string('payment_collection_slug');
            $table->string('sb_payment_collection_slug');
            $table->string('bill_charge');
            $table->string('payment_charge');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billplz');
    }
};
