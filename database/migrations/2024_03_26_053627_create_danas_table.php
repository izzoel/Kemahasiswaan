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
            $table->bigInteger('id_ormawa');
            $table->string('tanggal_kegiatan');
            $table->bigInteger('id_kegiatan');
            $table->string('dana');
            $table->string('berkas');
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
