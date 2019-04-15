<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_kabupaten', function (Blueprint $table) {
            $table->bigIncrements('id_history_kab');
            $table->unsignedBigInteger('kasus_id');
            $table->unsignedBigInteger('imunisasi_id');
            $table->unsignedBigInteger('periode_id');
            $table->unsignedBigInteger('penduduk_id');
            $table->unsignedBigInteger('kabupaten_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_kabupatens');
    }
}
