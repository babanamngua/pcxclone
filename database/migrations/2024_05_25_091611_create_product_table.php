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
        Schema::create('product', function (Blueprint $table) {
            $table->integer('product_id', true);
            $table->string('product_name', 255);
            $table->integer('category_id')->nullable()->index('category_id');
            $table->integer('brand_id')->nullable()->index('brand_id');
            $table->integer('img_id')->index('img_id');
            $table->integer('color_id')->index('color_id');
            $table->decimal('price', 10, 0);
            $table->text('description');
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
