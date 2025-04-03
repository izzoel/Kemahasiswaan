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
        Schema::create('danas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_organisasi')->constrained('organisasis')->onDelete('cascade');
            $table->string('rentang_tanggal');
            $table->foreignId('id_kegiatan')->constrained('kegiatans')->onDelete('cascade');
            $table->string('anggaran');
            $table->string('proposal');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danas');
    }
};
