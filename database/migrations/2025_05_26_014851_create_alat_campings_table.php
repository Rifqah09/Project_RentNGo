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
        Schema::create('alat_campings', function (Blueprint $table) {
            $table->string('nama_alat');
            $table->id();
            $table->string('gambar_url')->nullable();
            $table->decimal('harga_sewa', 10, 2);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
            // $table->integer('stok');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_campings');
    }
};
