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
        Schema::table('em_massages', function (Blueprint $table) {
            $table->string('img_founder')->nullable()->after('img');
            $table->string('founder_name')->nullable()->after('img_founder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('em_massages', function (Blueprint $table) {
            $table->dropColumn('img_founder');
            $table->dropColumn('founder_name');
        });
    }
};
