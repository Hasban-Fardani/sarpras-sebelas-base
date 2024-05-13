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
            $table->id();
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('supplier_id');
            $table->timestamps();

            $table->foreign('unit_id')->references('id')->on('unit')->cascadeOnDelete();
            $table->foreign('supplier_id')->references('id')->on('supplier')->cascadeOnDelete();
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
