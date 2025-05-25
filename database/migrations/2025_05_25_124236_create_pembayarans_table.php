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
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('penyewaan_id')->constrained()->onDelete('cascade');
        $table->decimal('subtotal', 12, 2);
        $table->timestamp('payment_date')->nullable();
        $table->enum('metode_pembayaran', ['cash'])->default('cash');
        $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
