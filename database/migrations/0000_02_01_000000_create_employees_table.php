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
        Schema::create('employees', function (Blueprint $table) {
            $table->ulid('id')->primary(); // Using ULID as the primary key
            $table->foreignUlid('seksi_id')->nullable()->constrained('seksis');
            $table->string('nama_pelaksana');
            $table->enum('jenis_kelamin', ['L', 'P']); // Gender (Laki-laki/Perempuan)
            $table->string('pangkat_golongan');
            $table->string('jabatan');
            $table->string('no_telp');
            $table->string('instansi');
            $table->enum('status_pegawai', ['KLHK   ', 'Non KLHK']); // Employee status
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
