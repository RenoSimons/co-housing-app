<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_offers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('start_date');
            $table->string('province');
            $table->string('city');
            $table->string('type_house');
            $table->string('surface');
            $table->string('budget');
            $table->string('housemates');
            $table->string('house_description');
            $table->string('housemates_description');
            $table->integer('views');
            $table->json('img_urls');
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
        Schema::dropIfExists('rent_offers');
    }
}
