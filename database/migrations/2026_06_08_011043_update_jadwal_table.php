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
        Schema::table('jadwal', function (Blueprint $table) {

        $table->dropColumn([
            'kelas',
            'guru',
            'subject',
            'jam'
        ]);

        $table->foreignId('kelas_id')
              ->constrained('kelas')
              ->cascadeOnDelete();

        $table->foreignId('guru_id')
              ->constrained('guru')
              ->cascadeOnDelete();

        $table->foreignId('mapel_id')
              ->constrained('mapel')
              ->cascadeOnDelete();

        $table->time('jam_mulai');
        $table->time('jam_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
