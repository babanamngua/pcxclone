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
        Schema::create('color', function (Blueprint $table) {
            $table->integer('color_id', true);
            $table->integer('product_id')->nullable(); // Cho phép product_id chứa giá trị null
            $table->string('color_name', 100);
            $table->string('color_code',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('color');
    }
};
