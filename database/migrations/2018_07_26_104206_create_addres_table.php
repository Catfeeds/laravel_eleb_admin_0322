<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('province');
            $table->string('city');
            $table->string('county');
            $table->string('address');
            $table->string('tel');
            $table->string('name');
            $table->integer('is_default');
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
        Schema::dropIfExists('addres');
    }
}
