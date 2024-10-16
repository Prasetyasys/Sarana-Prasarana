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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->string('code', 20)->primary();
            $table->string('request_code', 20);
            $table->string('nip', 20);
            $table->string('perihal', 50);
            $table->string('sifat', 50);
            $table->enum('status', ['Diambil', 'Belum Diambil'])->default('Belum Diambil');
            $table->integer('total_item')->default(0);
            $table->timestamps();

            $table->foreign('nip')
                ->references('nip')
                ->on('pegawai')
                ->onDelete('cascade');

            $table->foreign('request_code')
                ->references('code')
                ->on('permintaan')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
