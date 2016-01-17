<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function ($table) {
            $table->increments('id');
            $table->integer('apartment_id');
            $table->boolean('internet');
            $table->boolean('parking');
            $table->boolean('tv');
            $table->boolean('klima');
            $table->boolean('vesmasina');
            $table->boolean('ljubimci');
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
        Schema::drop('accessories');
    }
}
