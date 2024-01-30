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
            $table->unsignedBigInteger('mattresses_materials_id');
            $table->foreign('mattresses_materials_id', 'mattress_fastenings_fk')
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
