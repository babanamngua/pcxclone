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
        // Schema::create('quantity', function (Blueprint $table) {
        //     $table->integer('quantity_id', true);
        //     $table->integer('product_id')->nullable(); 
        //     $table->integer('color_id')->nullable();
        //     $table->integer('quantity_product')->nullable();
        // });

        // Kiểm tra xem bảng đã tồn tại chưa
        if (!Schema::hasTable('quantity')) {
            // Tạo bảng nếu chưa tồn tại
            Schema::create('quantity', function (Blueprint $table) {
                $table->id('quantity_id');
                $table->unsignedBigInteger('product_id')->nullable();
                $table->unsignedBigInteger('color_id')->nullable();
                $table->integer('quantity_product')->nullable();
                $table->integer('discount_id')->nullable();
                $table->string('capacity', 255);
                $table->string('size', 100);
                $table->decimal('price', 10, 0);
            });
        } else {
            // Thực hiện các thay đổi khác nếu bảng đã tồn tại
            Schema::table('quantity', function (Blueprint $table) {
                // Kiểm tra và thêm các cột nếu cần thiết
                if (!Schema::hasColumn('quantity', 'product_id')) {
                    $table->unsignedBigInteger('product_id')->nullable();
                }
                if (!Schema::hasColumn('quantity', 'color_id')) {
                    $table->unsignedBigInteger('color_id')->nullable();
                }
                if (!Schema::hasColumn('quantity', 'quantity_product')) {
                    $table->integer('quantity_product')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quantity');
    }
};
