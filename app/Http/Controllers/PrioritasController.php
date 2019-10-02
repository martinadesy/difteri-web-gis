<?php

namespace App\Http\Controllers;

use App\AHP_Prioritas;
use Illuminate\Http\Request;

class PrioritasController extends Controller
{
    public function prioritas()
{
    $params = [
        'ahp_prioritas' => AHP_Prioritas::all()[0]
    ];

    return view('/process.prioritas', $params);
}

    public function crudkasus(Request $request)
{
    $id = $request->input('id');
    if($id){
        $data = Kasus::find($id);
    }else{
        $data = new Kasus();
    }
    $params = [
        'kematian' => 'kematian',
        'jml_penderita' =>'jml_pederita',
        'kabupaten'=>Jatim::all(),
        'tahun' =>'tahun',
        'data'=>$data
    ];
    return view('crudkasus',$params);
}

    public function save(Request $request){
    $data = new Kasus();

    $data->jml_penderita = $request->jml_penderita;
    $data->kematian = $request->kematian;
    $data->id_jatim = $request->id_jatim;
    $data->tahun = $request->tahun;
    try{
        $data->save();
        return redirect(route('datakasus'));
//            return "<div class='alert alert-success'>Data Kasus berhasil ditambahkan!</div>
//                    <script> scrollToTop(); reload(1500); </script>";
    }
    catch(\Exception $ex){
        dd($ex);
        return "<div class='alert alert-danger'>Terjadi kesalahan! Data gagal ditambahkan!</div>";
    }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $new_data = new Kasus;
    $new_data->jml_penderita = $request->jml_penderita;
    $new_data->kematian = $request->kematian;
    $new_data->id_jatim = $request->id_jatim;
    $new_data->tahun = $request->tahun;
//        dd($new_data);
    try {
        $new_data->saveOrFail();
    } catch (\Throwable $e) {
        redirect('/');
    }
    return redirect('/datakasus');
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $new_data = AHP_Prioritas::query()->find($id);
    $new_data->jml_penderita = $request->jml_penderita;
    $new_data->kematian = $request->kematian;
    $new_data->dpt_1 = $request->imunisasi;
    $new_data->dpt_2 = $request->imunisasi;
    $new_data->dpt_3 = $request->imunisasi;
    $new_data->jml_penduduk = $request->jml_penduduk;
    $new_data->kelembaban_udara = $request->kelembaban_udara;
//        dd($new_data);
    try {
        $new_data->saveOrFail();
    } catch (\Throwable $e) {
        redirect('/');
    }
    return redirect('prioritas/');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $new_data = Kasus::query()->find($id);
    try {
        $new_data->delete();
    } catch (\Exception $exception) {
        //
    }
    return redirect('/datakasus');
}
}
