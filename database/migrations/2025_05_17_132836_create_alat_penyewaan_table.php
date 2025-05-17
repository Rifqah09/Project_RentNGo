<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlatPenyewaanTable extends Migration
{
    public function up()
    {
        Schema::create('alat_penyewaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyewaan_id')->constrained('penyewaans')->onDelete('cascade');
            $table->foreignId('alat_camping_id')->constrained('alat_campings')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alat_penyewaan');
    }
}
