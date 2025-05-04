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
            $table->id();
            $table->foreignId('penyewaan_id')->constrained()->onDelete('cascade');
            $table->decimal('total', 10, 2);
            $table->timestamp('payment_date');
            $table->enum('payment_method', ['credit_card', 'bank_transfer', 'cash']);
            $table->enum('status', ['pending', 'completed', 'failed']);
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
