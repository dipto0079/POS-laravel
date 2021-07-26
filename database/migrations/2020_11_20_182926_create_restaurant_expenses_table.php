<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_restaurant_expenses', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('amount', 10, 2);
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('tbl_restaurant_expense_items')->onDelete('cascade');
            $table->string('employee_id', 6);
            $table->text('note')->nullable();
            $table->string('user_id', 6);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('tbl_restaurants')->onDelete('cascade');
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
        Schema::dropIfExists('tbl_restaurant_expenses');
    }
}
