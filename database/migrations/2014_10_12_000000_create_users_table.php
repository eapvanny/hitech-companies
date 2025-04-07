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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile')->nullable();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('role')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',255);
            $table->integer('active_status')->default('1')->comment('1 for active and 0 for inactive');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
