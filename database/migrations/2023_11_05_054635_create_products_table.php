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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table->string('discount')->nullable();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('thumbnail');
            $table->string('sku')->nullable();
            $table->integer('rating')->default(4);
            $table->double('price')->default(0.00);
            $table->integer('quantity')->default(0);
            $table->string('short_desc');
            $table->longText('long_desc')->nullable();
            $table->integer('popular')->nullable();
            $table->integer('islamic')->nullable();
            $table->integer('children')->nullable();
            $table->integer('novels')->nullable();
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
