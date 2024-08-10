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
        Schema::create('return_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->integer('order_item_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->string('new', 1);// 0 sản phẩm lỗi , 1 sản phẩm đã đổi trả
            $table->integer('exchange_order_item_id');
            $table->integer('exchange_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_items');
    }
};
