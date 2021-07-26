<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRateTblRestaurantSettingsTaxFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_restaurant_settings_tax_fields', function (Blueprint $table) {
            $table->float('rate', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_restaurant_settings_tax_fields', function (Blueprint $table) {
            $table->dropColumn(['rate']);
        });
    }
}
