<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ql64_sinhvien', function (Blueprint $table) {
            $table->string('MSSV');
            $table->primary('MSSV');
            $table->string('hoten');
            $table->string('gioitinh');
            $table->string('email');
            $table->string('nganh');
            $table->integer('status')->default(0);
            $table->integer('nhomid')->unsigned()->nullable();
            $table->foreign('nhomid')->references('nhomid')->on('ql64_nhom');
            $table->integer('userid')->unsigned()->nullable();
            $table->foreign('userid')->references('userid')->on('ql64_users')->onDelete('cascade');
            $table->integer('detaiid')->unsigned()->nullable();
            $table->foreign('detaiid')->references('dtid')->on('ql64_detai')->onDelete('cascade');
            $table->integer('khoaid')->unsigned()->nullable();
            $table->foreign('khoaid')->references('khoaid')->on('ql64_khoahoc')->onDelete('cascade');
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
        Schema::drop('ql64_sinhvien');
    }
}
