<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOnlineOrderDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customer_online_order_delivery_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id', 30)->nullable();
            $table->string('customer_address_id', 30)->nullable();
            $table->unsignedBigInteger('online_order_id');
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
        Schema::dropIfExists('tbl_customer_online_order_delivery_addresses');
    }
}
