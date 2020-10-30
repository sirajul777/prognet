<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('alamat', 100);
            $table->string('telepon', 30);
            $table->unsignedBigInteger('darahid');
            $table->string('email', 100);
            $table->timestamps();
            $table->foreign('darahid')->references('id')->on('golongan_darahs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontaks');
    }
}
