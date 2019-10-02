<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kasus')->insert(['jml_penderita' => 0, 'kematian' => 0, 'kabupaten_id' => 0]);
        DB::table('kasus')->insert(['jml_penderita' => 0, 'kematian' => 0, 'kabupaten_id' => 0]);
        DB::table('kasus')->insert(['jml_penderita' => 0, 'kematian' => 0, 'kabupaten_id' => 0]);
        DB::table('kasus')->insert(['jml_penderita' => 0, 'kematian' => 0, 'kabupaten_id' => 0]);
        DB::table('kasus')->insert(['jml_penderita' => 0, 'kematian' => 0, 'kabupaten_id' => 0]);
        DB::table('kasus')->insert(['jml_penderita' => 0, 'kematian' => 0, 'kabupaten_id' => 0]);
        DB::table('kasus')->insert(['jml_penderita' => 0, 'kematian' => 0, 'kabupaten_id' => 0]);
    }
}
