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
        Schema::create('quantity', function (Blueprint $table) {
            $table->integer('quantity_id', true);
            $table->integer('product_id')->nullable(); // Cho phép product_id chứa giá trị null
            $table->integer('color_id')->nullable();
            $table->integer('quantity_product')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quantity');
    }
};
