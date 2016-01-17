<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartmens', function ($table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->string('apartment_name')->unique();
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
        Schema::drop('apartmans');
    }
}
