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
        Schema::table('our_waters', function (Blueprint $table) {
            //
            $table->string('title_kh')->nullable()->after('title');
            $table->string('description_kh')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('our_waters', function (Blueprint $table) {
            //
            $table->string('title_kh')->nullable()->after('title');
            $table->string('description_kh')->nullable()->after('description');
        });
    }
};
