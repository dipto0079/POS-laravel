<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantWastesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_wastes', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no')->nullable();
            $table->date('date');
            $table->float('total_loss', 10, 2)->nullable();
            $table->string('employee_id', 6)->nullable();
            $table->text('note')->nullable();
            $table->string('user_id', 6);
            $table->unsignedBigInteger('food_menu_waste_qty')->nullable();
            $table->unsignedBigInteger('food_menu_id')->nullable();
            $table->foreign('food_menu_id')->references('id')->on('tbl_restaurant_food_menus')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_wastes');
    }
}
