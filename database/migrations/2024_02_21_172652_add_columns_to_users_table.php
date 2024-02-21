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
        Schema::table('users', function (Blueprint $table) {
            $table->string('pan_card')->nullable();

            // Add adhar_card column
            $table->string('adhar_card')->nullable();

            // Add photo column
            $table->string('pan_card_photo')->nullable();
            $table->string('adhar_card_photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('pan_card');
            $table->dropColumn('adhar_card');

            $table->dropColumn('adhar_card_photo');
            $table->dropColumn('pan_card_photo');
        });
    }
};
