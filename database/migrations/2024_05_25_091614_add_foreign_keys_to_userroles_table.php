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
        Schema::table('userroles', function (Blueprint $table) {
            $table->foreign(['user_id'], 'userroles_ibfk_1')->references(['user_id'])->on('users')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['role_id'], 'userroles_ibfk_2')->references(['role_id'])->on('roles')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['assigned_by'], 'userroles_ibfk_3')->references(['admin_id'])->on('admin')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('userroles', function (Blueprint $table) {
            $table->dropForeign('userroles_ibfk_1');
            $table->dropForeign('userroles_ibfk_2');
            $table->dropForeign('userroles_ibfk_3');
        });
    }
};
