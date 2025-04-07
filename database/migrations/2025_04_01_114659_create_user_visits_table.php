<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('user_visits', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('user_visits');
    // }

    public function up()
    {
        Schema::create('user_visits', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable(); // Assuming users are logged in
            $table->timestamp('visited_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_visits');
    }
};
