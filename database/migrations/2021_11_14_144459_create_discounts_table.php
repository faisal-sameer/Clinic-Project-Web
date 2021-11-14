<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('employee_id')->unsigned()->index()->nullable();
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('clinic_id')->unsigned()->index()->nullable();
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->integer('type')->nullable();
            $table->string('text')->nullable();
            $table->string('path')->nullable();
            $table->integer('order')->nullable();
            $table->tinyInteger('Status');
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
        Schema::dropIfExists('discounts');
    }
}
