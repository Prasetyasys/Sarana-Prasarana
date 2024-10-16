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
        Schema::create('detail_permintaan', function (Blueprint $table) {
            $table->id();
            $table->string('request_code', 20);
            $table->string('item_code', 20)->unique();
            $table->integer('quantity');
            $table->integer('quantity_approved')->default(0);
            $table->timestamps();

            $table->foreign('request_code')->references('code')->on('permintaan')->onDelete('cascade');
            $table->foreign('item_code')->references('code')->on('item')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_permintaan');
    }
};
