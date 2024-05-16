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
            $table->dropColumn('role_4');
            $table->dropColumn('role_5');
            $table->dropColumn('role_6');
            $table->dropColumn('role_7');
            $table->dropColumn('role_8');
            $table->dropColumn('role_9');
            $table->dropColumn('role_10');
            $table->dropColumn('role_11');
            $table->dropColumn('role_12');
            $table->dropColumn('role_13');
        });
    }


};
