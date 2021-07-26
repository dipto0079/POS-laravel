<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSalesHoldsDetailsModifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_sales_holds_details_modifiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modifier_id');
            $table->float('modifier_price', 10, 2);
            $table->unsignedBigInteger('food_menu_id');
            $table->unsignedBigInteger('holds_id');
            $table->unsignedBigInteger('holds_details_id');
            $table->string('user_id', 6);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id', 'restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
            $table->string('customer_id', 30)->nullable();
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
        Schema::dropIfExists('tbl_restaurant_sales_holds_details_modifiers');
    }
}
