<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSettingsChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_settings_charges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit');
            $table->float('one_time_charge', 10, 2)->nullable();
            $table->float('monthly_charge', 10, 2)->nullable();
            $table->float('annual_charge', 10, 2)->nullable();
            $table->string('charge_id', 6);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_settings_charges');
    }
}
