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
        Schema::create('our_waters', function (Blueprint $table) {
            $table->id();
            $table->string('bottle')->nullable();
            $table->string('title')->nullable();
            $table->text('description') -> nullable();
            $table->integer('active_status')->default(1)->comment('1 for active and 0 for inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('our_water');
    }
};
