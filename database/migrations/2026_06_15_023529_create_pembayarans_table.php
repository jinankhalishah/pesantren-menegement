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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();


            $table->foreignId('santri_id')
                ->constrained('santri')
                ->cascadeOnDelete();

            $table->foreignId('jenis_pembayaran_id')
                ->constrained('jenis_pembayaran')
                ->cascadeOnDelete();

            $table->date('tanggal_bayar');

            $table->bigInteger('jumlah_bayar');

            $table->enum('metode_bayar', [
                'Tunai',
                'Transfer'
            ]);

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
