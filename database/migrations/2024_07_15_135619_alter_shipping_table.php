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
        if (!Schema::hasTable('shipping')) {
            Schema::create('shipping', function (Blueprint $table) {
                    $table->integer('shipping_id', true);
                    $table->integer('order_id');
                    $table->integer('shipping_method_id');
                    $table->string('address_start');
                    $table->string('address_end');
                    $table->decimal('kg', 10, 3);
                    $table->decimal('km', 10, 1);
                    $table->decimal('shipping_price', 10, 0);
                    $table->decimal('total_price', 10, 0);
                    $table->dateTime('shipping_date')->nullable();
                    $table->dateTime('shipped_date')->nullable();
                    $table->enum('status', ['pending', 'shipped', 'delivered'])->default('pending');
        });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping');
    }
};
