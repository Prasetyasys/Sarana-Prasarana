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
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->string('code', 20)->primary();
            $table->string('nip', 20);
            $table->string('supplier_code', 20);
            $table->integer('total_item')->default(0);
            // $table->string('image');
            $table->timestamps();

            $table->foreign('nip')
                ->references('nip')
                ->on('pegawai')
                ->onDelete('cascade');

            $table->foreign('supplier_code')->references('code')->on('supplier')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuk');
    }
};
