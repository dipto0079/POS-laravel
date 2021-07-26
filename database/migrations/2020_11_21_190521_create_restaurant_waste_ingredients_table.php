<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantWasteIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_waste_ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('ingredient_id', 6)->nullable();
            $table->float('waste_amount', 10, 2)->nullable();
            $table->float('last_purchase_price', 10, 2)->nullable();
            $table->float('loss_amount', 10, 2)->nullable();
            $table->string('waste_id', 6)->nullable();
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
        Schema::dropIfExists('tbl_restaurant_waste_ingredients');
    }
}
