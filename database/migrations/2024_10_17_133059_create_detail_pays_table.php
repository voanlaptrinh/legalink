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
        Schema::create('detail_pays', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('bank_number');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('image')->nullable();
       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pays');
    }
};