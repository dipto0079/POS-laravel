<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOnlineOrderDetailsModifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_online_order_details_modifiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('modifier_id');
            $table->float('modifier_price', 10, 2);
            $table->unsignedBigInteger('food_menu_id');
            $table->unsignedBigInteger('online_order_id');
            $table->unsignedBigInteger('online_order_details_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id', 'restn_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
            $table->string('customer_id', 30)->nullable();
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
        Schema::dropIfExists('tbl_customer_online_order_details_modifiers');
    }
}
