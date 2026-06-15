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
        Schema::create('santri', function (Blueprint $table) {

            $table->id();

            $table->string('nis')->unique();

            $table->string('name');

            $table->enum(
                'gender',
                [
                    'Laki-laki',
                    'Perempuan'
                ]
            );

            $table->enum(
                'status',
                [
                    'Aktif',
                    'Nonaktif'
                ]
            )->default('Aktif');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri');
    }
};
