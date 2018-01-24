<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistration7sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration7s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('umur_calon_pasangan');
            $table->integer('randUmur');
            $table->string('tb_calon_pasangan');
            $table->integer('randTb');
            $table->string('merokok_calon_pasangan');
            $table->string('penghasilan_calon_pasangan');
            $table->integer('randPenghasilan');
            $table->string('suku_calon_pasangan');
            $table->string('bb_calon_pasangan');
            $table->integer('randBb');
            // $table->string('suku_domisili_pasangan');
            $table->string('karakter_pasangan');
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
        Schema::dropIfExists('registration7s');
    }
}
