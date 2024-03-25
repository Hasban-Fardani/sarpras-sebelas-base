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
        Schema::create('incoming_item_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('incoming_item_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('incoming_item_id')->references('id')->on('incoming_items')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incoming_item_details');
    }
};
