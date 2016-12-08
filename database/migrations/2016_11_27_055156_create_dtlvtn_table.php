<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDtlvtnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ql64_dtlvtn', function (Blueprint $table) {
            $table->increments('lvtnid');
            $table->integer('dtid')->unsigned()->nullable();
            $table->foreign('dtid')->references('dtid')->on('ql64_detai')->onDelete('cascade');
            $table->integer('tttnid')->unsigned()->nullable();
            $table->foreign('tttnid')->references('tttnid')->on('ql64_dttttn')->onDelete('cascade');
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
        Schema::drop('ql64_dtlvtn');
    }
}
