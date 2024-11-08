<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCommentTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_comment_', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->unsignedBigInteger('product_id'); // Khóa ngoại liên kết với bảng product
            $table->unsignedBigInteger('user_id'); // Khóa ngoại liên kết với bảng users
            $table->string('comment'); // Cột chứa bình luận
            $table->enum('vote_start', ['1', '2', '3', '4', '5'])->default('5'); // Cột đánh giá
            $table->timestamps(); // Cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_comment_');
    }
}
