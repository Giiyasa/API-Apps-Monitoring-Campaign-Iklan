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
        Schema::create('master_iklans', function (Blueprint $table) {
            $table->uuid('id_iklan')->primary()->unique();
            $table->uuid('id_produk');
            $table->foreign('id_produk')->references('produk_id')->on('master_produks');
            $table->string('nama_campaign');
            $table->string('durasi_campaign');
            $table->datetime('tanggal_mulai');
            $table->decimal('harga_iklan', 8, 2);
            $table->decimal('bidding_iklan', 8, 2);
            $table->string('tanggal_selesai');
            $table->integer('ctr_target');
            $table->decimal('ctr_persen_target', 8, 2);
            $table->integer('crt_target');
            $table->decimal('cr_persen_target', 8, 2);
            $table->decimal('roas_target', 8, 2);
            $table->decimal('roas_bep', 8, 2);
            $table->integer('ctr_update');
            $table->decimal('ctr_persen_update', 8, 2);
            $table->integer('cr_update');
            $table->decimal('cr_persen_update', 8, 2);
            $table->decimal('roas_update', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_iklans');
    }
};
