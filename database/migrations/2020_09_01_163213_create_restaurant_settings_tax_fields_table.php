<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantSettingsTaxFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_settings_tax_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('tbl_restaurant_settings_taxes')->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('tbl_restaurant_settings_tax_fields');
    }
}
