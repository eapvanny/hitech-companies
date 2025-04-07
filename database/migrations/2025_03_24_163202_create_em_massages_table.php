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
        Schema::create('em_massages', function (Blueprint $table) {
            $table->id();
            $table->string('em_name')->nullable();
            $table->string('img')->nullable();
            $table->longText('message_kh')->nullable();
            $table->longText('message_en')->nullable();
            $table->string('active_status')->default(1)->comment('1 for active and 0 for inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('em_massages');
    }
};
