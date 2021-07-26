<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_users', function (Blueprint $table) {
            $table->id();
            $table->string('manager_name');
            $table->string('manager_phone');
            $table->string('manager_email');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('email_verified')->default(0);
            $table->string('email_verification_token');
            $table->string('role')->default('Manager');
            $table->enum('del_status', ['Live', 'Deleted'])->default('Live');
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
        Schema::dropIfExists('tbl_restaurant_users');
    }
}
