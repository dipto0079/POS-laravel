<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantFoodMenuIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_food_menu_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ing_id');
            $table->foreign('ing_id', 'ing_id')->references('id')->on('tbl_restaurant_ingredients')->onDelete('cascade');
            $table->float('consumption', 10, 2);
            $table->unsignedBigInteger('food_menu_id');
            $table->foreign('food_menu_id', 'food_menu_id')->references('id')->on('tbl_restaurant_food_menus')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_food_menu_ingredients');
    }
}
