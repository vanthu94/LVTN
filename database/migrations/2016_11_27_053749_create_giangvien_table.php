<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiangvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ql64_giangvien', function (Blueprint $table) {
            $table->string('MSGV');
            $table->primary('MSGV');
            $table->string('hocvi');
            $table->string('hoten');
            $table->string('gioitinh');
            $table->string('email');
            $table->string('chuyennganh');
            $table->integer('userid')->unsigned()->nullable();
            $table->foreign('userid')->references('userid')->on('ql64_users')->onDelete('cascade');
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
        Schema::drop('ql64_giangvien');
    }
}
