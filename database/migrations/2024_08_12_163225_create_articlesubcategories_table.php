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
        Schema::create('articlesubcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('articlecategorie_id')->references('id')->on('articlecategories')->cascadeOnDelete();
            $table->string('image_name');
            $table->text('descreption')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articlesubcategories');
    }
};
