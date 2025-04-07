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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->longText('title_kh')->nullable();
            $table->longText('title_en')->nullable();
            // $table->longText('description_kh')->nullable();
            // $table->longText('description_en')->nullable();
            $table->integer('active_status')->default(1)->comment('1 for active and 0 for inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
