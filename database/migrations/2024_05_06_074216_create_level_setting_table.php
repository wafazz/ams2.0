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
        Schema::create('level_setting', function (Blueprint $table) {
            $table->id();
            $table->string('role_1')->nullable();
            $table->string('role_2')->nullable();
            $table->string('role_3')->nullable();
            $table->string('role_4')->nullable();
            $table->string('role_5')->nullable();
            $table->string('role_6')->nullable();
            $table->string('role_7')->nullable();
            $table->string('role_8')->nullable();
            $table->string('role_9')->nullable();
            $table->string('role_10')->nullable();
            $table->string('role_11')->nullable();
            $table->string('role_12')->nullable();
            $table->string('role_13')->nullable();
            $table->string('role_14')->nullable();
            $table->integer('level_usage')->default(1);
            $table->string('system_logo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_setting');
    }
};
