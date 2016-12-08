<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDttttnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ql64_dttttn', function (Blueprint $table) {
            $table->increments('tttnid');
            $table->integer('dtid')->unsigned()->nullable();
            $table->foreign('dtid')->references('dtid')->on('ql64_detai')->onDelete('cascade');
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
        Schema::drop('ql64_dttttn');
    }
}
