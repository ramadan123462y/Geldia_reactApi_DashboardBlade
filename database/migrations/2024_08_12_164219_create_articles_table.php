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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('is_new')->nullable();
            $table->boolean('home_page')->default(0);
            $table->boolean('most_famous')->default(0);
            $table->string('image_file');
            $table->unsignedInteger('count_views')->default(0);
            $table->foreignId('articlesubcategorie_id')->references('id')->on('articlesubcategories')->cascadeOnDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
