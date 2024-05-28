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
        Schema::create('brand', function (Blueprint $table) {
            $table->integer('brand_id', true);
            $table->string('brand_name', 255);
            $table->string('url_name', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand');
        Schema::table('brand', function (Blueprint $table) {
            $table->dropTimestamps();
                            });
    }

};
