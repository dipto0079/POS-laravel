<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantFoodMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_food_menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->unsignedBigInteger('cat_id');
            // $table->foreign('cat_id', 'cat_id')->references('id')->on('tbl_restaurant_ingredient_categories')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('tbl_restaurant_food_menu_categories')->onDelete('cascade');
            $table->float('dine_in_price', 10, 2);
            $table->float('take_away_price', 10, 2);
            $table->float('delivery_order_price', 10, 2);
            $table->text('description')->nullable();
            $table->string('photo')->nullable();
            $table->enum('veg_item', ['Yes', 'No'])->default('Yes');
            //this field was removed
            // $table->enum('beverage', ['Yes', 'No'])->default('Yes');
            //this has many to many relation
            // $table->unsignedBigInteger('shift_id');
            // $table->foreign('shift_id')->references('id')->on('tbl_restaurant_food_menu_shifts')->onDelete('cascade');
            $table->unsignedBigInteger('panel_id');
            $table->foreign('panel_id')->references('id')->on('tbl_restaurant_kitchen_panels')->onDelete('cascade');
            $table->longText('tax_info')->nullable();
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
            $table->string('user_id', 6);
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
        Schema::dropIfExists('tbl_restaurant_food_menus');
    }
}
