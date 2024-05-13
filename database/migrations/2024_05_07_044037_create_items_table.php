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
            $table->id();
            $table->string('name', 50);
            $table->string('kode', 10);
            $table->string('merek', 25);
            $table->integer('harga');
            $table->integer('stok')->default(0);
            $table->integer('stok_minimum')->default(0);
            $table->unsignedBigInteger('kategor_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
