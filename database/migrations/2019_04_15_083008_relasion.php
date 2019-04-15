<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relasion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ahp', function (Blueprint $table) {
            $table->foreign('history_kabupaten_id')->references('id_history_kab')->on('history_kabupaten')->onDelete('cascade');
        });
        Schema::table('history_kabupaten', function (Blueprint $table) {
            $table->foreign('kasus_id')->references('id_kasus')->on('kasus')->onDelete('cascade');
            $table->foreign('imunisasi_id')->references('id_imunisasi')->on('imunisasi')->onDelete('cascade');
            $table->foreign('periode_id')->references('id_periode')->on('periode')->onDelete('cascade');
            $table->foreign('penduduk_id')->references('id_penduduk')->on('penduduk')->onDelete('cascade');
            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('jatim')->onDelete('cascade');
        });
        Schema::table('imunisasi', function (Blueprint $table) {
            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('jatim')->onDelete('cascade');
        });
        Schema::table('kasus', function (Blueprint $table) {
            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('jatim')->onDelete('cascade');
        });
        Schema::table('penduduk', function (Blueprint $table) {
            $table->foreign('kabupaten_id')->references('id_kabupaten')->on('jatim')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
