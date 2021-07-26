<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSettingsThirdPartyVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_settings_third_party_vendors', function (Blueprint $table) {
            $table->id();
            $table->enum('availability', ['Yes', 'No'])->default('No');
            $table->string('third_party_vendors_id', 6)->nullable();
            $table->unsignedBigInteger('restaurant_id');
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
        Schema::dropIfExists('tbl_restaurant_settings_third_party_vendors');
    }
}
