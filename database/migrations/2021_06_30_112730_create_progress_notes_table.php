<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress_notes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->index();
            $table->foreign('doctor_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('patient_id')->unsigned()->index();
            $table->foreign('patient_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->mediumText('Note');
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
        Schema::dropIfExists('progress_notes');
    }
}
