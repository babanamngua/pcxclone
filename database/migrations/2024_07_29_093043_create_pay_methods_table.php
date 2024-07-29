
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
        if (!Schema::hasTable('pay_methods')) {
        Schema::table('pay_methods', function (Blueprint $table) {
            // Add or modify columns here
            $table->integer('pay_methods_id', true);
            $table->string('method_name', 100);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pay_methods');
    }
};
