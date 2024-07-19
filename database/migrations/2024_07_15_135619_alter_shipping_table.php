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
