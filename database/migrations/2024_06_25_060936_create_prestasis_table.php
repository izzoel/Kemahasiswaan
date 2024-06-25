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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('id_prestasi');
            $table->string('nim');
            $table->string('nama');
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('tahun');
            $table->string('lomba');
            $table->string('tingkat');
            $table->string('prestasi');
            $table->string('sertifikat');
            $table->string('dokumentasi');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};
