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
        Schema::create('webconfigs', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('logo')->nullable();
            $table->text('key')->nullable();
            $table->string('website')->nullable();
            $table->text('address')->nullable();
            $table->string('code')->nullable();
            $table->text('gg_map')->nullable();
            $table->string('gg_analytic')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('zalo')->nullable();
            $table->string('description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('youtube')->nullable();
            $table->string('dribbble')->nullable();
            $table->string('whats_app')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('telegram')->nullable();
            $table->string('google')->nullable(); 
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('reddit')->nullable();
            $table->string('linkedin')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webconfigs');
    }
};
