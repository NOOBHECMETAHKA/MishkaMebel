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
        Schema::create('furniture_storages', function (Blueprint $table) {
            $table->id();
            $table->string('view');
            $table->string('type');

            $table->bigInteger('furniture_storages_furniture_dimensions_id')->unsigned();
            $table->foreign('furniture_storages_furniture_dimensions_id', 'furniture_storages_furniture_dimensions_fk')
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
        Schema::dropIfExists('furniture_storages');
    }
};
