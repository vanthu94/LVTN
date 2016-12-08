<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ql64_nhom', function (Blueprint $table) {
            $table->increments('nhomid');
            $table->string('tennhom');
            $table->integer('sosv');
            $table->integer('namhoc');
            $table->integer('hocki');
            $table->integer('statusdk')->default(0);
            $table->integer('detaiid')->unsigned()->nullable();
            $table->foreign('detaiid')->references('dtid')->on('ql64_detai')->onDelete('cascade');
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
        Schema::drop('ql64_nhom');
    }
}
