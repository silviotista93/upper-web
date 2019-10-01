<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarDetailSuscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_detail_suscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('carsus_id');
            $table->foreign('carsus_id')->references('id')->on('car_subscriptions');
            $table->unsignedInteger('plan_type_id');
            $table->foreign('plan_type_id')->references('id')->on('plan_type_washes');
            $table->integer('quantity');
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
        Schema::dropIfExists('car_detail_suscriptions');
    }
}
