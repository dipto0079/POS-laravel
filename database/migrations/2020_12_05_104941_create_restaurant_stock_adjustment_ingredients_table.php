<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantStockAdjustmentIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_stock_adjustment_ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('ingredient_id', 6)->nullable();
            $table->float('consumption_amount', 10, 2);
            $table->string('stock_adjustment_id', 6)->nullable();
            $table->enum('consumption_status', ['Plus', 'Minus'])->nullable();
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id', 'restr_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_stock_adjustment_ingredients');
    }
}
