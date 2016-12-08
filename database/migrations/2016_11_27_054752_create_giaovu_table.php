<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiaovuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ql64_giaovu', function (Blueprint $table) {
            $table->string('staffid');
            $table->primary('staffid');
            $table->string('fullname');
            $table->string('gioitinh');
            $table->string('email');
            $table->string('phone');
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
        Schema::drop('ql64_giaovu');
    }
}
