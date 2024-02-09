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
        Schema::create('mattresses', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('age_category');
            $table->string('hardness');

            $table->unsignedBigInteger('mattresses_materials_id');
            $table->foreign('mattresses_materials_id', 'mattresses_materials_fk')
                ->on('materials')->references('id')
                ->onDelete('cascade');

            $table->unsignedBigInteger('mattresses_furniture_sizes_id');
            $table->foreign('mattresses_furniture_sizes_id', 'mattresses_furniture_sizes_fk')
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
        Schema::dropIfExists('mattresses');
    }
};
