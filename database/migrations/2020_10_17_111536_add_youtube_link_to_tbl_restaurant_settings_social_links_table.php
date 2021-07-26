<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddYoutubeLinkToTblRestaurantSettingsSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_restaurant_settings_social_links', function (Blueprint $table) {
            // $table->string('youtube_username')->nullable();
            // $table->string('youtube_password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_restaurant_settings_social_links', function (Blueprint $table) {
            $table->dropColumn(['youtube_username',  'youtube_password']);
        });
    }
}
