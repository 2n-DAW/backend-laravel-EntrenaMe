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
        Schema::table('courts_sports', function (Blueprint $table) {
            $table->foreign(['id_sport'], 'courts_sports_ibfk_1')->references(['id_sport'])->on('sports')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_court'], 'courts_sports_ibfk_2')->references(['id_court'])->on('courts')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courts_sports', function (Blueprint $table) {
            $table->dropForeign('courts_sports_ibfk_1');
            $table->dropForeign('courts_sports_ibfk_2');
        });
    }
};
