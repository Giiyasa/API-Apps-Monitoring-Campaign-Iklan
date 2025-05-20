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
        Schema::create('master_produks', function (Blueprint $table) {
            $table->uuid('produk_id')->primary()->unique();
            $table->string('nama_produk');
            $table->string('kategori_produk');
            $table->decimal('sell_price', 8, 2);
            $table->decimal('cogs_price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_produks');
    }
};
