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
        Schema::table('them_settings', function (Blueprint $table) {
            //
            $table->string('active_status')->default('1')->after('footer_decor')->comment('1 for active and 0 for inactive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('them_settings', function (Blueprint $table) {
            $table->string('active_status')->default('1')->after('footer_decor')->comment('1 for active and 0 for inactive');
        });
    }
};
