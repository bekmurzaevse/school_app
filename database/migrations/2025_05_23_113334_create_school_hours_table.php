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
        Schema::create('school_hours', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->foreignId('school_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            $table->json('workday');
            $table->json('holiday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_hours');
    }
};
