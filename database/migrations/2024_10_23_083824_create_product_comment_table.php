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
        Schema::create('product_comment_', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id');
            $table->string('comment');
            $table->enum('vote_start',['1','2','3','4','5'])->default('5');
            $table->foreign('product_id')->references('id')->on('product')
            ->onDelete('cascade');// xóa cha con
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade');// xóa cha con
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_comment_');
    }
};