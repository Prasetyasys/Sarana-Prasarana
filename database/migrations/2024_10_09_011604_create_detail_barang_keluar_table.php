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
        Schema::create('detail_barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->string('outgoing_item_code', 20);
            $table->string('item_code', 20);
            $table->integer('quantity')->default(0);
            $table->timestamps();

            $table->foreign('outgoing_item_code')->references('code')->on('barang_keluar')->cascadeOnDelete();
            $table->foreign('item_code')->references('code')->on('item')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_barang_keluar');
    }
};
