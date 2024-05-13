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
            $table->unsignedBigInteger('permintaan_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('kuantiti');
            $table->integer('kuantiti_disetujui');
            $table->timestamps();

            $table->foreign('permintaan_id')->references('id')->on('permintaan')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
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
