<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistration4sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration4s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            // $table->string('sd');
            // $table->string('smp');
            // $table->string('sma');
            // $table->string('perguruan_tinggi');
            $table->string('pendidikan_terakhir');
            $table->string('prestasi');
            $table->string('organisasi');
            $table->string('pengalaman_kerja');
            $table->string('keahlian_khusus');
            $table->timestamps();
            // $table->foreign('id_user')->references('id')->on('registration1s')->onUpdate('cascade')->onDelete('cascade');
        });

        // Schema::table('registration4s', function (Blueprint $table) {
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
        Schema::dropIfExists('registration4s');
    }
}
