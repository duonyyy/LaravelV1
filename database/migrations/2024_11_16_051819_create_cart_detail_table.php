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
        Schema::create('cart_detail', function (Blueprint $table) {
            $table->increments('id'); // Primary key
            $table->unsignedBigInteger('cart_id'); // Foreign key to cart table
            $table->unsignedBigInteger('product_id'); // Foreign key to product table
            $table->integer('quantity')->default(1); // Default quantity
            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade'); // Foreign key constraint
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade'); // Foreign key constraint
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_detail');
    }
};
