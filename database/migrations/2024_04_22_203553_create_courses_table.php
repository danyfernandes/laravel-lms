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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('excerpt');
            $table->string('image_path');
            $table->string('slug');
            $table->string('price');
            $table->string('level');
            $table->enum('status', ['enabled', 'disabled'])->default('disabled');
            $table->string('audio');
            $table->string('subtitles');
            $table->string('access')->default('Lifetime');
            $table->unsignedBigInteger('duration')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
