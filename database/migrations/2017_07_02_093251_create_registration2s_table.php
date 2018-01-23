<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistration2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration2s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('tinggi_badan')->unsigned();
            $table->integer('berat_badan')->unsigned();
            $table->string('gol_darah');
            $table->string('merokok');
            $table->string('riwayat_kesehatan');
            $table->timestamps();
            // $table->foreign('id_user')->references('id')->on('registration1s')->onUpdate('cascade')->onDelete('cascade');
        });

        // Schema::table('registration2s', function (Blueprint $table) {
        //     $table->integer('id_user')->unsigned();
        //     $table->foreign('id_user')->references('id')->on('registration1s')->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration2s');
    }
}
