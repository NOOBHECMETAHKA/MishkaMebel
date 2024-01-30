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
        Schema::create('furniture_dimensions', function (Blueprint $table) {
            $table->id();
            $table->decimal('length',10 ,2);
            $table->decimal('width', 10 ,2);
            $table->decimal('height', 10 ,2);
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furniture_dimensions');
    }
};
