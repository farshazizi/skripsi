<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistration6sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration6s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            // $table->string('kelebihan');
            // $table->string('kekurangan');
            $table->string('deskripsi_diri');
            $table->string('visi_pernikahan');
            // $table->string('misi_pernikahan');
            $table->string('kehidupan_rumah_tangga');
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
        Schema::dropIfExists('registration6s');
    }
}
