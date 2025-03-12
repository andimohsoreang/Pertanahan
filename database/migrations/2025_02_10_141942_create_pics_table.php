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
        Schema::create('pics', function (Blueprint $table) {
            $table->ulid('id')->primary(); // ULID for primary key
            $table->foreignUlid('business_trip_id')->constrained('business_trips');
            $table->foreignUlid('employee_id')->constrained('employees');
            $table->text('uraian_tugas'); // Description of the task
            $table->string('surat_tugas_nomor', 50); // Task letter number
            $table->date('surat_tugas_tanggal'); // Task letter date
            $table->date('tanggal_mulai'); // Start date of the trip
            $table->date('tanggal_selesai'); // End date of the trip
            $table->softDeletes();
            $table->timestamps(); // Created at and updated at timestamps

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pics');
    }
};
