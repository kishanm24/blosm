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
        Schema::create('otp_logs', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('otp');
            $table->integer('attempt_count')->default(0);
            $table->timestamp('last_attempt_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_logs');
    }
};
