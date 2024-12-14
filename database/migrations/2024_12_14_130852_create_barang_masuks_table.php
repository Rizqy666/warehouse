<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->integer('stok')->default(0);
            $table->date('tanggal')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('is_masuk')->default(true);
            $table->bigInteger('harga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }
};
