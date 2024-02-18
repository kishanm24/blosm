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
            $table->string('business_name')->nullable();
            $table->string('business_logo')->nullable();
            $table->string('gst_number')->nullable();
            $table->string('gst_certificate_logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('business_name');
            $table->dropColumn('business_logo');
            $table->dropColumn('gst_number');
            $table->dropColumn('gst_certificate_logo');
        });
    }
};
