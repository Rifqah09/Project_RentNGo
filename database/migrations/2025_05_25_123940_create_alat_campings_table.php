<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('alat_campings', function (Blueprint $table) {
        $table->id();
        $table->string('nama_alat');
        $table->text('deskripsi');
        $table->decimal('harga_sewa', 12, 2);
        $table->integer('stok');
        $table->timestamps();
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
