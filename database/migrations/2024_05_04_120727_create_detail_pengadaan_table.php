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
        Schema::create('detail_pengadaan', function (Blueprint $table) {
            $table->id();
            $table->string('submission_code', 20);
            $table->string('item_code', 20)->unique();
            $table->integer('quantity');
            $table->integer('quantity_approved')->default(0);
            $table->timestamps();

            $table->foreign('submission_code')->references('code')->on('pengadaan')->onDelete('cascade');
            $table->foreign('item_code')->references('code')->on('item')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pengadaan');
    }
};
