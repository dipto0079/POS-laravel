<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_id', 6)->unique();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('tbl_countries')->onDelete('set null');
            $table->unsignedBigInteger('state_id')->nullable();
            $table->foreign('state_id')->references('id')->on('tbl_states')->onDelete('set null');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('tbl_cities')->onDelete('set null');
            $table->string('address');
            $table->enum('approval_status', ['Approve', 'Disapprove'])->default('Disapprove');
            $table->string('slug');
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
        Schema::dropIfExists('tbl_restaurants');
    }
}
