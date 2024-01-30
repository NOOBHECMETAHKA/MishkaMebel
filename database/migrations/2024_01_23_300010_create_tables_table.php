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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tables_materials_id');
            $table->foreign('tables_materials_id', 'tables_materials_fk')
                ->on('materials')->references('id')
                ->onDelete('cascade');

            $table->bigInteger('tables_furniture_dimensions_id')->unsigned();
            $table->foreign('tables_furniture_dimensions_id', 'tables_furniture_dimensions_fk')
                ->on('furniture_dimensions')->references('id')
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
        Schema::dropIfExists('tables');
    }
};
