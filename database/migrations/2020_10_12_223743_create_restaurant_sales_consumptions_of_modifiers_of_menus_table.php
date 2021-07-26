<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSalesConsumptionsOfModifiersOfMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_sales_cons_of_mod_of_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredient_id')->nullable();
            $table->float('consumption', 10, 2)->nullable();
            $table->unsignedBigInteger('sale_consumption_id')->nullable();
            $table->unsignedBigInteger('sales_id');
            $table->tinyInteger('order_status');
            $table->unsignedBigInteger('food_menu_id');
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
        Schema::dropIfExists('tbl_restaurant_sales_cons_of_mod_of_menus');
    }
}
