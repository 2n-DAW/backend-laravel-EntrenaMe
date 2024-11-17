<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courts_sports', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sport');
            $table->unsignedBigInteger('id_court');
            $table->primary(['id_sport', 'id_court']);
    
            $table->foreign('id_sport')->references('id_sport')->on('sports')->onDelete('cascade');
            $table->foreign('id_court')->references('id_court')->on('courts')->onDelete('cascade');
        });
    }
    
    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts_sports');
    }
};
