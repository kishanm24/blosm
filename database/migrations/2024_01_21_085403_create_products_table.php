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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('brand_id')->constrained('brands');

            $table->string('name');
            $table->string('description');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->string('image');
            $table->boolean('is_custom');
            $table->foreignId('main_category_id')->nullable();

            $table->foreignId('sub_category_id')->nullable();
            $table->foreignId('master_category_id')->nullable();
            $table->foreign('master_category_id')->references('id')->on('master_categories')->onDelete('set null');

            $table->foreign('main_category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('sub_category_id')->references('id')->on('categories')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
