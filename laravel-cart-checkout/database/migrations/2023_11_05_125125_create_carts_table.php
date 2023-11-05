<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('address_id')->nullable();
            $table->foreignId('voucher_id')->nullable();
            $table->timestamps();
        });

        Schema::create('cart_product', function (Blueprint $table) {
            $table->foreignId('cart_id');
            $table->foreignId('product_id');
            $table->unsignedInteger('count')->default(1);

            $table->unique(['cart_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
