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
    Schema::create('alat_penyewaans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('penyewaan_id')->constrained()->onDelete('cascade');
        $table->foreignId('alat_camping_id')->constrained()->onDelete('cascade');
        $table->integer('jumlah');
        $table->decimal('subtotal', 12, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alat_penyewaans');
    }
};
