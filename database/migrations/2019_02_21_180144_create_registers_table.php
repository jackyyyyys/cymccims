<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rfid_reader_id')->unsigned();
            $table->foreign('rfid_reader_id')->references('id')->on('rfid_readers')->onDelete('cascade');
            $table->integer('rfid_tag_id')->unsigned();
            $table->foreign('rfid_tag_id')->references('id')->on('rfid_tags')->onDelete('cascade');
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
        Schema::drop('registers');
    }
}
