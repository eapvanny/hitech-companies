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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('title_kh')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description_kh') -> nullable();
            $table->text('description_en') -> nullable();
            $table->integer('active_status') -> default(1)->comment('1 for active and 0 for inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
