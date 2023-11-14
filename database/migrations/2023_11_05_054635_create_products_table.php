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
            $table->foreignId('category_id');
            $table->string('discount')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('thumbnail');
            $table->string('sku')->nullable();
            $table->double('price')->default(0.00);
            $table->integer('quantity')->default(0);
            $table->string('short_desc');
            $table->longText('long_desc')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
