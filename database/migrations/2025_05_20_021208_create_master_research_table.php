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
        Schema::create('master_research', function (Blueprint $table) {
            $table->uuid('research_id')->primary()->unique();
            $table->string('nama_toko');
            $table->longText('Deskripsi');
            $table->string('alamat');
            $table->decimal('price', 8, 2);
            $table->integer('rating');
            $table->integer('jumlah_penjualan');
            $table->bigInteger('jumlah_keuntungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_research');
    }
};
