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
        Schema::create('candidate_achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->constrained('users');
            $table->integer('year');
            $table->string('title');
            $table->enum('type', ['competition', 'organizational', 'volunteer']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_achievements');
    }
};
