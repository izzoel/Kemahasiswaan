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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('id_ormawa');
            $table->string('tanggal');
            $table->string('nama');
            $table->string('anggaran');
            $table->string('berkas');
            $table->enum('status', ['Ditinjau', 'Disetujui', 'Ditolak', 'Ditunda']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
