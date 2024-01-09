<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**This is the pivot table that connects the Races and Results with each other.
     * We first construct a primary key out of the race_id + result_id this prevents duplicate entries in our table.
     * Afterward we define our Foreign Keys as unsignedBigIntegers.
     * And as last we tell our table to automatically delete its connected entry if one of the results gets deleted in the connected tables.
     * We do this with the onDelete('cascade') functionality.
     * Below u can see the Values and rows that are being created to achieve all of this.
    */
    public function up(): void
    {
        Schema::create('race_result', function (Blueprint $table) {
            $table->primary(['race_id', 'result_id']);
            $table->unsignedBigInteger('race_id');
            $table->unsignedBigInteger('result_id');
            $table->foreign('race_id')->references('id')->on('races')->onDelete('cascade');
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_result');
    }
};
