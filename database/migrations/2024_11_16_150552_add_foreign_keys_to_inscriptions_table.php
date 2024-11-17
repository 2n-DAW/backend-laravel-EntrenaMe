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
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->foreign(['id_activity'], 'inscriptions_ibfk_1')->references(['id_activity'])->on('activities')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_user_client'], 'inscriptions_ibfk_2')->references(['id_client'])->on('clients')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscriptions', function (Blueprint $table) {
            $table->dropForeign('inscriptions_ibfk_1');
            $table->dropForeign('inscriptions_ibfk_2');
        });
    }
};
