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
       Schema::create('alat_penyewaan', function (Blueprint $table) {
           $table->foreignId('alat_camping_id')->constrained()->onDelete('cascade');
           $table->id();
           $table->integer('jumlah');
           $table->foreignId('penyewaan_id')->constrained()->onDelete('cascade');
           $table->timestamps();
           $table->decimal('subtotal', 10, 2);
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_penyewaan');
    }
};
