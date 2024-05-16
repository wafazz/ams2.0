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
        Schema::table('products', function (Blueprint $table) {
            $table->float('role_4', 10, 2);
            $table->float('role_5', 10, 2);
            $table->float('role_6', 10, 2);
            $table->float('role_7', 10, 2);
            $table->float('role_8', 10, 2);
            $table->float('role_9', 10, 2);
            $table->float('role_10', 10, 2);
            $table->float('role_11', 10, 2);
            $table->float('role_12', 10, 2);
            $table->float('role_13', 10, 2);
        });
    }


};
