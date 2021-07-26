<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('reference_no');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('tbl_restaurant_suppliers')->onDelete('set null');
            $table->string('date', 15);
            $table->float('subtotal', 10, 2);
            $table->float('grand_total', 10, 2);
            $table->float('paid', 10, 2);
            $table->float('due', 10, 2);
            $table->enum('purchase_type', ['Direct Purchase', 'Purchase Request']);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
            $table->string('user_id', 6);
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
        Schema::dropIfExists('tbl_restaurant_purchases');
    }
}
