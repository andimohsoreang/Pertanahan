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
        Schema::create('lodgings', function (Blueprint $table) {
            $table->ulid('id')->primary(); // ULID for primary key
            $table->foreignUlid('pic_id')->constrained('pics');
            $table->integer('jumlah_malam'); // Number of nights
            $table->decimal('satuan', 10, 0); // Cost per night
            $table->decimal('total', 10, 0); // Total lodging cost
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lodgings');
    }
};
