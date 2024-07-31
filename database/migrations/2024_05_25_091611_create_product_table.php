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
            $table->text('description');
            $table->text('product_specifications');
            $table->decimal('weight', 10, 3);
            $table->string('url_name', 191);
            $table->timestamps();
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
