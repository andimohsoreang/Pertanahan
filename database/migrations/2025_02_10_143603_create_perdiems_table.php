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
        Schema::create('perdiems', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('pic_id')->constrained('pics');
            $table->integer('jumlah_hari'); // Number of days
            $table->decimal('satuan', 10, 0); // Daily allowance amount
            $table->decimal('total', 10, 0); // Total daily allowance
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perdiems');
    }
};
