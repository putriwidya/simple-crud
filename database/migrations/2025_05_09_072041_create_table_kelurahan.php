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
        Schema::create('T_PROVINSI', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('name');
            $table->boolean('status')->default(0); 
            $table->timestamps();
        });

        Schema::create('T_KECAMATAN', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('kode');
            $table->string('name');
            $table->foreignId('T_PROVINSI');
            $table->boolean('status')->default(0); 
            $table->timestamps();
        });

        Schema::create('T_KELURAHAN', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('kode');
            $table->string('name');
            $table->foreignId('T_KECAMATAN');
            $table->boolean('status')->default(0); 
            $table->timestamps();
        });

        Schema::create('T_PEGAWAI', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('T_KELURAHAN');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('jk');
            $table->string('alamat');
            $table->boolean('status')->default(0); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('T_PROVINSI');
        Schema::dropIfExists('T_KECAMATAN');
        Schema::dropIfExists('T_KELURAHAN');
        Schema::dropIfExists('T_PEGAWAI');
    }
};
