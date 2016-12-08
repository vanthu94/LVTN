<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ql64_detai', function (Blueprint $table) {
            $table->increments('dtid');
            $table->string('tendt');
            $table->integer('sosv');
            $table->date('tgbd');
            $table->date('tgkt');
            $table->string('yeucau');
            $table->string('noidung');
            $table->string('filenoidung');
            $table->string('filenhanxet');
            $table->integer('phanloai')->default(0);
            $table->integer('statusdt')->default(0);
            $table->string('giangvienid')->unsigned()->nullable();
            $table->foreign('giangvienid')->references('MSGV')->on('ql64_giangvien')->onDelete('cascade');
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
        Schema::drop('ql64_detai');
    }
}
