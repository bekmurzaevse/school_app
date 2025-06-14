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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->json('full_name');
            $table->string('username')->unique();
            $table->string('password');
            $table->json('description')->nullable();
            $table->string('phone')->unique();
            $table->foreignId('school_id')->constrained('schools', 'id')->cascadeOnUpdate()->restrictOnDelete();
            $table->date('birth_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
