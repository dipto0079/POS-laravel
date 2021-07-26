<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_sales_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_menu_id');
            $table->string('menu_name', 255)->nullable();
            $table->unsignedBigInteger('qty');
            $table->unsignedBigInteger('tmp_qty');
            $table->float('menu_price_without_discount', 10, 2);
            $table->float('menu_price_with_discount', 10, 2);
            $table->float('menu_unit_price', 10, 2);
            $table->float('menu_vat_percentage', 10, 2)->nullable();
            $table->text('menu_taxes')->nullable();
            $table->string('menu_discount_value', 30)->nullable();
            $table->string('discount_type', 30);
            $table->string('menu_note', 150)->nullable();
            $table->double('discount_amount', 10, 2)->nullable();
            $table->string('item_type', 50)->nullable();
            $table->time('delay_time')->nullable();
            $table->string('cooking_status', 50)->nullable();
            $table->dateTime('cooking_start_time');
            $table->dateTime('cooking_done_time');
            $table->unsignedBigInteger('previous_id');
            $table->unsignedBigInteger('sales_id');
            $table->tinyInteger('order_status');
            $table->string('user_id', 6);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_sales_details');
    }
}
