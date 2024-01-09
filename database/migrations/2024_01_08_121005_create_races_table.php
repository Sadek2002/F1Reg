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
    {/**
     * We create a Races table that holds some values that are relevant to the races.
     * Below u can see the Values and rows that are being created.
     * The Races table is also part of a MANY-TO-MANY Relationship with the Results
     */
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('racename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
