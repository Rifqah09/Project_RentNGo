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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->foreignId('penyewaan_id')->constrained()->onDelete('cascade');
            $table->id();
            $table->timestamp('payment_date')->nullable();
            $table->decimal('subtotal', 10, 2);
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->enum('metode_pembayaran', ['credit', 'transfer', 'cash']);
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
