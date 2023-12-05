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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('cupon_id')->nullable();
            $table->foreignId('ship_charge_id')->nullable();
            $table->string('payment_type')->default('cash');
            $table->string('payment_status')->default('due');
            $table->string('delivery_status')->default('pending');
            $table->double('order_amount')->default(0.00);
            $table->integer('order_quantity')->default(0);
            $table->string('order_date');
            $table->string('transaction_no');
            $table->longText('shipping_address')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
