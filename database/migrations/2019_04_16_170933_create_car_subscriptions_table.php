<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_subscriptions', function (Blueprint $table) {
            $table->increments('id');           
            $table->unsignedInteger('cars_id');
            $table->foreign('cars_id')->references('id')->on('cars');
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans');
            $table->enum('state',[
                \App\CarSubscription::ACTIVE,
                \App\CarSubscription::INACTIVE])->default(\App\CarSubscription::ACTIVE);
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
        Schema::dropIfExists('car_subscriptions');
    }
}
