<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistration3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration3s', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('nama_ayah');
            $table->string('suku_ayah');
            $table->string('nama_ibu');
            $table->string('suku_ibu');
            $table->string('alamat_ortu');
            $table->timestamps();
            // $table->foreign('id_user')->references('id')->on('registration1s')->onUpdate('cascade')->onDelete('cascade');
        });

        // Schema::table('registration3s', function (Blueprint $table) {
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
        Schema::dropIfExists('registration3s');
    }
}
