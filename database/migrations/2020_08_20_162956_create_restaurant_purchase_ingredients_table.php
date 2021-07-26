<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantPurchaseIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_purchase_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('tbl_restaurant_ingredients')->onDelete('cascade');
            $table->float('unit_price', 10, 2);
            $table->float('quantity_amount', 10, 2);
            $table->float('total', 10, 2);
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id')->references('id')->on('tbl_restaurant_purchases')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_purchase_ingredients');
    }
}
