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
            // Patient Info
            $table->string('NID');
            $table->string('Name');
            $table->string('Date');
            $table->string('Phone');
            // Type of Service or Discount 
            $table->integer('services_id')->unsigned()->index()->nullable();
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('discount_id')->unsigned()->index()->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
            // Doctor id 
            $table->integer('doctor_id')->unsigned()->index()->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            // User Id Who Change on this Reservation 
            $table->integer('employee_id')->unsigned()->index()->nullable();
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            // Token to send Notification  can be null able if Patient Reservation from web 
            $table->mediumText('Token')->nullable();

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
        Schema::dropIfExists('reservations');
    }
}
