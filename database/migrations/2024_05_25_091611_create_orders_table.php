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
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('order_id', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('sdt',11);
            $table->string('address', 255);
            $table->decimal('total_price', 10,0)->nullable();
            $table->integer('shipping_methods_id');
            $table->integer('pay_methods_id');
            $table->enum('status', ['Chưa xác nhận','Đã xác nhận','Đang giao hàng','Đã giao hàng','hoàn thành','Hủy đơn hàng','Đã hoàn lại tiền','Thất bại'])->default('Chưa xác nhận');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
