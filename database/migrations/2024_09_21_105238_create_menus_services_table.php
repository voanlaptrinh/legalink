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
        Schema::create('menus_services', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tên menu
            $table->string('description')->nullable(); // Tên menu
            $table->string('image')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable(); // Để thiết kế menu con
            $table->string('alias')->nullable();
            $table->timestamps();
        
            // Foreign key để liên kết với bảng chính (menu cha)
            $table->foreign('parent_id')->references('id')->on('menus_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus_services');
    }
};
