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
        Schema::create('suggested_meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('calories');
            $table->integer('protein');
            $table->integer('fats');
            $table->integer('carbs');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggested_meals');
    }
};
