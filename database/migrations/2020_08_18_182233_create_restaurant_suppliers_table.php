<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_person');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('routing_number')->nullable();
            $table->text('address')->nullable();
            $table->string('zip')->nullable();
            $table->longText('description')->nullable();
            // $table->unsignedBigInteger('category_id')->nullable();
            // $table->foreign('category_id')->references('id')->on('tbl_restaurant_ingredient_categories')->onDelete('set null');
            $table->string('order_method')->nullable();
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
        Schema::dropIfExists('tbl_restaurant_suppliers');
    }
}

