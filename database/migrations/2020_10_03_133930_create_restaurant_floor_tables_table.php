<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantFloorTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_floor_tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('guest_count');
            $table->float('width', 10, 2);
            $table->float('height', 10, 2);
            $table->string('position')->nullable();
            $table->string('table_type');
            // $table->string('waiter_id', 6);
            $table->unsignedBigInteger('floor_id');
            $table->foreign('floor_id')->references('id')->on('tbl_restaurant_floors')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_floor_tables');
    }
}
