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
        Schema::create('content_about_pages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('about_page_id');
            $table->unsignedBigInteger('lang_id');
            $table->string('slug')->unique();
            $table->string('year')->nullable();
            $table->string('title')->nullable();
            $table->text('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_about_pages');
    }
};
