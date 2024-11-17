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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id('id_inscription');
            $table->unsignedBigInteger('id_activity');
            $table->unsignedBigInteger('id_user_client');
            $table->string('slug_inscription')->nullable();
    
            $table->foreign('id_activity')->references('id_activity')->on('activities')->onDelete('cascade');
            $table->foreign('id_user_client')->references('id_client')->on('clients')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
