<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerRestaurantSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_restaurant_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->boolean('subscribe')->default(0);
            $table->string('customer_id', 30);
            $table->unsignedBigInteger('restaurant_id');
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
        Schema::dropIfExists('tbl_customer_restaurant_subscriptions');
    }
}
