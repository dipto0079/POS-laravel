<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantModifierForFoodMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_modifier_for_food_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mdf_id');
            $table->foreign('mdf_id', 'mdf_id')->references('id')->on('tbl_restaurant_food_menu_modifiers')->onDelete('cascade');
            $table->unsignedBigInteger('fd_menu_id');
            $table->foreign('fd_menu_id', 'fd_menu_id')->references('id')->on('tbl_restaurant_food_menus')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_modifier_for_food_menus');
    }
}
