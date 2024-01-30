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
        Schema::create('beds', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->boolean('have_boxes')->default(0);

            $table->unsignedBigInteger('beds_bases_id');
            $table->foreign('beds_bases_id', 'beds_bases_fk')
                ->on('bed_bases')->references('id')
                ->onDelete('cascade');

            $table->unsignedBigInteger('beds_materials_id');
            $table->foreign('beds_materials_id', 'beds_materials_fk')
                ->on('materials')->references('id')
                ->onDelete('cascade');

            $table->unsignedBigInteger('bed_furniture_sizes_id');
            $table->foreign('bed_furniture_sizes_id', 'bed_furniture_sizes_fk')
                ->on('furniture_sizes')->references('id')
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
        Schema::dropIfExists('beds');
    }
};
