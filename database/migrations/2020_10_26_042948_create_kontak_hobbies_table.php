<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontakHobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontak_hobbies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kontakid');
            $table->unsignedBigInteger('hobbyid');
            $table->timestamps();
            $table->foreign('kontakid')->references('id')->on('kontaks')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('hobbyid')->references('id')->on('hobbies')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontak_hobbies');
    }
}
