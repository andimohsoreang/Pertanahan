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
        Schema::create('business_trips', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('document_id')->constrained('documents');
            $table->string('nomor_spm')->unique()->index();
            $table->string('nomor_sp2d')->unique()->index();
            $table->decimal('transport_antar_kota', 10, 0)->nullable();
            $table->decimal('taksi_airport', 10, 0)->nullable();
            $table->decimal('lain_lain', 10, 0)->nullable();
            $table->decimal('grand_total', 10, 0);
            // Tambahan untuk soft delete
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bussiness_trips');
    }
};
