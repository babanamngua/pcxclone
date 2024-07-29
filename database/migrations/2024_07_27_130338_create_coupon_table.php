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
        if (!Schema::hasTable('coupon')) {
            Schema::create('coupon', function (Blueprint $table) {
                $table->id();
                $table->string('code', 50)->nullable();
                $table->string('description')->nullable();
                $table->unsignedBigInteger('discount_id')->nullable();
                $table->dateTime('expiry_date')->nullable();
                $table->integer('quantity')->nullable();
                $table->integer('remaining_quantity')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon');
    }
};
