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
        Schema::create('courts_hours', function (Blueprint $table) {
            $table->id('id_court_hour');
            $table->unsignedBigInteger('id_court');
            $table->unsignedBigInteger('id_hour');
            $table->integer('day_number');
            $table->string('slug_court_hour')->nullable();
    
            $table->foreign('id_court')->references('id_court')->on('courts')->onDelete('cascade');
            $table->foreign('id_hour')->references('id_hour')->on('hours')->onDelete('cascade');
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courts_hours');
    }
};
