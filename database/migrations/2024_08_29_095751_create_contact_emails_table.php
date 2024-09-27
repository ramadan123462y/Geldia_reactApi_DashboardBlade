<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // 'name' => 'required',
    // 'phone' => 'required',
    // 'userType' => 'required',
    // 'content' => 'required',
    public function up(): void
    {
        Schema::create('contact_emails', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->foreignId('user_type_id')->references('id')->on('user_types')->cascadeOnDelete();
            $table->string('email');
            $table->longText('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_emails');
    }
};
