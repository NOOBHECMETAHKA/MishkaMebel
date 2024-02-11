<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_cost', 10, 2, true);

            $table->bigInteger('order_status_id')->unsigned();
            $table->foreign('order_status_id', 'order_status_fk')
                ->on('statuses')->references('id')
                ->onDelete('cascade');

            $table->bigInteger('order_address_id')->unsigned();
            $table->foreign('order_address_id', 'order_address_fk')
                ->on('addresses')->references('id')
                ->onDelete('cascade');

            $table->boolean('enabling_deliveries')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
