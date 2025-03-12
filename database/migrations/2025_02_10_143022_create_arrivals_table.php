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
        Schema::create('arrivals', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('pic_id')->constrained('pics');
            $table->string('moda_transportasi', 50); // Mode of transportation
            $table->decimal('harga_tiket', 10, 0); // Ticket price
            $table->string('nomor_tiket', 20); // Ticket number
            $table->string('kode_booking', 20); // Booking code
            $table->date('arrival_date'); // Return date
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arrivals');
    }
};
