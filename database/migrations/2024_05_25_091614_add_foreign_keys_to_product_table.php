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
        Schema::table('product', function (Blueprint $table) {
            $table->foreign(['category_id'], 'product_ibfk_1')->references(['category_id'])->on('category')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['brand_id'], 'product_ibfk_2')->references(['brand_id'])->on('brand')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['color_id'], 'product_ibfk_3')->references(['color_id'])->on('color')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['img_id'], 'product_ibfk_4')->references(['img_id'])->on('img')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->dropForeign('product_ibfk_1');
            $table->dropForeign('product_ibfk_2');
            $table->dropForeign('product_ibfk_3');
            $table->dropForeign('product_ibfk_4');
        });
    }
};
