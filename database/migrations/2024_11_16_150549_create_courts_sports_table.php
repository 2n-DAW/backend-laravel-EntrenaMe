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
        Schema::create('courts_sports', function (Blueprint $table) {
            $table->integer('id_sport');
            $table->integer('id_court')->index('id_court');

            $table->primary(['id_sport', 'id_court']);
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
