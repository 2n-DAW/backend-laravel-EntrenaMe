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
        Schema::create('activities', function (Blueprint $table) {
            $table->id('id_activity');
            $table->unsignedBigInteger('id_user_instructor');
            $table->string('n_activities');
            $table->integer('spots');
            $table->string('slug_activity')->nullable();
    
            $table->foreign('id_user_instructor')->references('id_instructor')->on('instructors')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
