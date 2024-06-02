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
        Schema::create('toy_chest_prizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('toy_chest_id');
            $table->foreign('toy_chest_id')->references('id')->on('toy_chests')->onDelete('cascade');
            $table->unsignedBigInteger('prize_id');
            $table->foreign('prize_id')->references('id')->on('prizes')->onDelete('cascade');
            $table->timestamp('claimed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toy_chest_prizes');
    }
};
