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
        Schema::table('instructors', function (Blueprint $table) {
            $table->foreign(['id_user'], 'instructors_ibfk_1')->references(['id_user'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropForeign('instructors_ibfk_1');
        });
    }
};
