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
        Schema::create('answer_question', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answer');
            $table->unsignedBigInteger('question');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('answer')->references('id')->on('answers')->onDelete('cascade');
            $table->foreign('question')->references('id')->on('questions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_question');
    }
};
