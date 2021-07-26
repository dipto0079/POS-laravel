<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_sales', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id', 30)->nullable();
            $table->string('sale_no', 30)->default('000000');
            $table->unsignedBigInteger('total_items')->nullable();
            $table->float('sub_total', 10, 2)->nullable();
            $table->double('paid_amount', 10, 2)->nullable();
            $table->float('due_total', 10, 2)->nullable();
            $table->string('disc', 50)->nullable();
            $table->float('disc_actual', 10, 2)->nullable();
            $table->float('vat', 10, 2)->nullable();
            $table->float('total_payable', 10, 2)->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->time('close_time')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->float('total_item_discount_amount', 10, 2);
            $table->float('sub_total_with_discount', 10, 2);
            $table->float('sub_total_discount_amount', 10, 2);
            $table->float('total_discount_amount', 10, 2);
            $table->float('delivery_charge', 10, 2);
            $table->string('sub_total_discount_value', 10);
            $table->string('sub_total_discount_type', 20);
            $table->string('sale_date', 20);
            $table->time('order_time');
            $table->dateTime('processing_date_time');
            $table->dateTime('cooking_start_time')->nullable();
            $table->dateTime('cooking_done_time')->nullable();
            $table->enum('modified', ['Yes', 'No'])->default('Yes');
            $table->string('user_id', 6);
            $table->string('waiter_id', 6);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
            $table->tinyInteger('order_status');
            $table->tinyInteger('order_type');
            $table->tinyInteger('order_from')->nullable()->comment('1= self order, 2= online order, 3 = 3rd partys order');
            $table->string('delivery_method_id', 30)->nullable();
            $table->enum('del_status', ['Live', 'Deleted'])->default('Live');
            $table->text('sale_vat_objects')->nullable();
            $table->double('tips', 10, 2)->nullable();
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
        Schema::dropIfExists('tbl_restaurant_sales');
    }
}
