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
        Schema::create('penyewaans', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->id();
            $table->date('tanggal_kembali');
            $table->date('tanggal_sewa');
            $table->timestamps();
            $table->enum('status', ['pending', 'confirmed', 'returned', 'canceled'])->default('pending');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaans');
    }
};
