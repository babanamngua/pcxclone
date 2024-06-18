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
        Schema::create('shipping', function (Blueprint $table) {
            $table->integer('shipping_id', true);
            $table->integer('order_id')->nullable()->index('order_id');
            $table->dateTime('shipping_date')->nullable();
            $table->string('shipping_address', 255)->nullable();
            $table->string('name', 225);
            $table->integer('sdt');
            $table->string('email', 225);
            $table->enum('status', ['pending', 'shipped', 'delivered'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping');
    }
};
