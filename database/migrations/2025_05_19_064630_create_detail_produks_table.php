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
        Schema::create('detail_produks', function (Blueprint $table) {
            // $table->id();
            $table->uuid('produk_detail_id')->primary()->unique();
            $table->uuid('id_produk');
            // ->foreign()->references('produk_id')->on('master_produks')->onDelete('cascade_product');
            $table->foreign('id_produk') ->references('produk_id')->on('master_produks') ->onDelete('cascade');
            $table->longText('deskripsi');
            $table->char('gambar', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_produks');
    }
};
