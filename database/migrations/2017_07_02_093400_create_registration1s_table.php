<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistration1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration1s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('posisi')->unsigned();
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat_email');
            $table->string('handphone');
            $table->string('alamat_tempat_tinggal');
            $table->string('pekerjaan');
            $table->string('suku');
            $table->string('status_pernikahan');
            $table->string('penghasilan');
            $table->string('izin_menikah');
            $table->string('alamat_tinggal_saat_ini');
            $table->timestamps();
        });

        // Schema::table('registration1s', function ($table) {
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registration1s');
    }
}
