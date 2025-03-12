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
        Schema::create('trip_files', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('business_trip_id')->constrained('business_trips');
            $table->string('nama_file'); // Nama asli file
            $table->string('path_file'); // Path penyimpanan file
            $table->string('mime_type')->nullable(); // Tipe MIME file
            $table->bigInteger('ukuran_file')->nullable(); // Ukuran file dalam bytes
            $table->enum('status_berkas', ['Telah Di Upload', 'Belum Di Upload'])
            ->default('Belum Di Upload');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_files');
    }
};
