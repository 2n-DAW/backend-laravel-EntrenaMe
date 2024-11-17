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
        Schema::create('instructors', function (Blueprint $table) {
            $table->id('id_instructor');
            $table->unsignedBigInteger('id_user');
            $table->string('nif')->nullable();
            $table->string('tlf', 20)->nullable();
            $table->string('address')->nullable();
    
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructors');
    }
};
