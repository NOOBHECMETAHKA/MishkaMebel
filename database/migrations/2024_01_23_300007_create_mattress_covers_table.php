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
        Schema::create('mattress_covers', function (Blueprint $table) {
            $table->id();
            $table->string('function');

            $table->unsignedBigInteger('mattress_covers_furniture_sizes_id');
            $table->foreign('mattress_covers_furniture_sizes_id', 'mattress_covers_furniture_sizes_fk')
                ->on('furniture_sizes')->references('id')
                ->onDelete('cascade');

            $table->unsignedBigInteger('mattress_fastenings_id');
            $table->foreign('mattress_fastenings_id', 'mattress_fastenings_id')
                ->on('mattress_fastenings')->references('id')
                ->onDelete('cascade');

            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mattress_covers');
    }
};
