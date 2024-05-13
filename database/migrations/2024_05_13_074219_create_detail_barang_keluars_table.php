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
            $table->unsignedBigInteger('barang_keluar_id');
            $table->integer('kuantiti');
            $table->timestamps();

            $table->foreign('barang_keluar_id')->references('id')->on('barang_keluar')->cascadeOnDelete();
            $table->foreignId('item_id')->constrained('item')->cascadeOnDelete();
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
