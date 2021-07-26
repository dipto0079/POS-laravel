<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSettingsSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_settings_social_links', function (Blueprint $table) {
            $table->id();
            // $table->string('facebook_username')->nullable();
            // $table->string('facebook_password')->nullable();
            // $table->string('twitter_username')->nullable();
            // $table->string('twitter_password')->nullable();
            // $table->string('instagram_username')->nullable();
            // $table->string('instagram_password')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('social_media_id', 6)->nullable();
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
            $table->string('user_id', 6);
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
        Schema::dropIfExists('tbl_restaurant_settings_social_links');
    }
}
