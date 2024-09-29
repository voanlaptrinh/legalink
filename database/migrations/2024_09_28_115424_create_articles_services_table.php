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
        Schema::create('articles_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menus_services_id'); // Liên kết với menu dịch vụ
            $table->json('members_ids')->nullable(); // Liên kết với thành viên
            $table->string('name'); // Tên bài viết
            $table->text('content'); // Nội dung bài viết
            $table->integer('views')->default(0); // Số lượt xem
            $table->string('alias')->nullable(); // Bí danh hoặc đường dẫn thay thế
            $table->timestamps();

            $table->foreign('menus_services_id')->references('id')->on('menus_services')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles_services');
    }
};
