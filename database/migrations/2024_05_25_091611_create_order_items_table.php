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
        Schema::create('order_items', function (Blueprint $table) {
            $table->integer('order_item_id', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->integer('order_id')->nullable()->index('order_id');
            $table->integer('product_id')->nullable()->index('product_id');
            $table->integer('quantity')->nullable();
            $table->decimal('price', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
