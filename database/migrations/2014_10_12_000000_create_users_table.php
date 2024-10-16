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
        Schema::create('user', function (Blueprint $table) {
            $table->string('nip', 20)->primary();
            $table->string('username', 50);
            $table->string('password');
            $table->enum('role', ['admin', 'unit', 'pengawas'])->default('unit');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('nip')->references('nip')->on('pegawai')->cascadeOnDelete();
        });

        // Schema::create('user', function (Blueprint $table){
        //     $table->string('email')->primary();
        //     $table->string('token');
        // });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
