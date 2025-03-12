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
        Schema::create('departures', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('pic_id')->constrained('pics');
            $table->string('mode_transportation', 50); // Transportation mode
            $table->decimal('ticket_price', 10, 0); // Ticket price
            $table->string('ticket_number', 20); // Ticket number
            $table->string('booking_code', 20); // Booking code
            $table->date('departure_date'); // Departure date
            $table->softDeletes();
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departures');
    }
};
