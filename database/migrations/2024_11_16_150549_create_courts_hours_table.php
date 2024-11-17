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
        Schema::create('courts_hours', function (Blueprint $table) {
            $table->integer('id_court_hour', true);
            $table->integer('id_court')->index('id_court');
            $table->integer('id_hour')->index('id_hour');
            $table->integer('day_number');
            $table->string('slug_court_hour')->nullable();
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
