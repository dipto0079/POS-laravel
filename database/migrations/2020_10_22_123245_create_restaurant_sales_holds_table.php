<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSalesHoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_sales_holds', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id', 30)->nullable();
            $table->string('hold_no', 30)->default('000000');
            $table->unsignedBigInteger('total_items')->nullable();
            $table->float('sub_total', 10, 2)->nullable();
            $table->double('paid_amount', 10, 2)->nullable();
            $table->float('due_amount', 10, 2)->nullable();
            $table->date('due_payment_date')->nullable();
            $table->string('disc', 50)->nullable();
            $table->float('disc_actual', 10, 2)->nullable();
            $table->float('vat', 10, 2)->nullable();
            $table->float('total_payable', 10, 2)->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->float('total_item_discount_amount', 10, 2);
            $table->float('sub_total_with_discount', 10, 2);
            $table->float('sub_total_discount_amount', 10, 2);
            $table->float('total_discount_amount', 10, 2);
            $table->float('delivery_charge', 10, 2);
            $table->string('sub_total_discount_value', 10);
            $table->string('sub_total_discount_type', 20);
            $table->string('token_no', 20)->nullable();
            $table->string('sale_date', 20);
            $table->time('sale_time');
            $table->string('user_id', 6);
            $table->string('waiter_id', 6);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
            $table->tinyInteger('order_status');
            $table->tinyInteger('order_type');
            $table->enum('del_status', ['Live', 'Deleted'])->default('Live');
            $table->text('sale_vat_objects')->nullable();
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
        Schema::dropIfExists('tbl_restaurant_sales_holds');
    }
}
