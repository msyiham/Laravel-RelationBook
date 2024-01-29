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
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('connect_id');
            $table->integer('status');
            $table->integer('number');
            $table->timestamps();
    
            // Foreign key constraint to link 'connect_id' to the 'id' column in the 'connect_points' table.
            $table->foreign('connect_id')->references('id')->on('connect_points')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points');
    }
};
