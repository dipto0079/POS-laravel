<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantFoodMenuModifierIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_food_menu_modifier_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ig_id');
            $table->foreign('ig_id', 'ig_id')->references('id')->on('tbl_restaurant_ingredients')->onDelete('cascade');
            $table->float('consumption', 10, 2);
            $table->unsignedBigInteger('mod_id');
            $table->foreign('mod_id', 'mod_id')->references('id')->on('tbl_restaurant_food_menu_modifiers')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_food_menu_modifier_ingredients');
    }
}
