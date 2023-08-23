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
        Schema::create('region_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('region');
            $table->unsignedBigInteger('role');
            $table->timestamps();

            $table->foreign('region')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('region_role');
    }
};
