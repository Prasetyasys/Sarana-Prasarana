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
        Schema::create('item', function (Blueprint $table) {
           $table->string('code', 10)->primary();
            $table->string('name', 100);
            $table->string('unit', 10);
            // $table->string('brand', 10);
            // $table->string('gambar')->nullable();
            $table->integer('price');
            $table->integer('stock')->default(0);
            $table->integer('minimum_stock')->default(0);
            $table->unsignedBigInteger('category_id');
            $table->text('description');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('kategori')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
