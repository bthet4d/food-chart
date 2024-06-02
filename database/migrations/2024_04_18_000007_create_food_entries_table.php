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
        Schema::create('food_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chart_id');
            $table->foreign('chart_id')->references('id')->on('charts')->onDelete('cascade');
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->date('date_tried');
            $table->integer('point_value')->default(2);
            $table->string('video_url')->nullable();
            $table->text('comments')->nullable();
            $table->decimal('star_rating', 2, 1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_entries');
    }
};
