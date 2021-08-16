<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('NID');
            $table->string('Name');
            $table->string('Date');
            $table->string('Phone');

            $table->integer('services_id')->unsigned()->index();
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('doctor_id')->unsigned()->index()->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('employee_id')->unsigned()->index()->nullable();
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('Status');

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
        Schema::dropIfExists('reservations');
    }
}
