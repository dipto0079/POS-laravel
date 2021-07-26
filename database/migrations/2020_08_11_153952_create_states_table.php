<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('tbl_countries')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_states');
    }
}
