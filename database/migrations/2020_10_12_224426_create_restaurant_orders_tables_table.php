<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantOrdersTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_orders_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('persons');
            $table->dateTime('booking_time');
            $table->unsignedBigInteger('sales_id');
            $table->string('sale_no', 30);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
            $table->unsignedBigInteger('table_id');
            $table->enum('del_status', ['Live', 'Deleted'])->default('Live');
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
        Schema::dropIfExists('tbl_restaurant_orders_table');
    }
}
