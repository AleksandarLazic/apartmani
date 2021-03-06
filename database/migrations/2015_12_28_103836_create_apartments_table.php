<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function ($table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('apartment_name');
            $table->string('city');
            $table->string('address');
            $table->smallInteger('price');
            $table->smallInteger('rooms');
            $table->smallInteger('beds');
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
        Schema::drop('apartments');
    }
}
