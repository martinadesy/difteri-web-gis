<?php

namespace App\Http\Controllers;

use App\Jatim;
use App\Imunisasi;
use Illuminate\Http\Request;

class DataImunisasiController extends Controller
{
    public function dataimunisasi()
    {
        $params = [
            'imunisasi' => Imunisasi::all()
        ];

        return view('dataimunisasi', $params);
    }

    public function createimunisasi(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = Imunisasi::find($id);
        }else{
            $data = new Imunisasi();
        }
        $params = [
            'dpt_1' => 'dpt_1',
            'dpt_2' =>'dpt_2',
            'dpt_3' => 'dpt_3',
            'bayi_lahir' =>'bayi_lahir',
            'kabupaten'=>Jatim::all(),
            'tahun' =>'tahun',
            'data'=>$data
        ];
        return view('createimunisasi',$params);
    }

    public function save(Request $request){
        $data = new Imunisasi();

        $data->dpt_1 = $request->dpt_1;
        $data->dpt_2 = $request->dpt_2;
        $data->dpt_3 = $request->dpt_3;
        $data->bayi_lahir = $request->bayi_lahir;
        $data->id_jatim = $request->id_jatim;
        $data->tahun = $request->tahun;
        try{
            $data->save();
            return redirect(route('dataimunisasi'));
//            return "<div class='alert alert-success'>Data Kasus berhasil ditambahkan!</div>
//                    <script> scrollToTop(); reload(1500); </script>";
        }
        catch(\Exception $ex){
            dd($ex);
            return "<div class='alert alert-danger'>Terjadi kesalahan! Data gagal ditambahkan!</div>";
        }
    }


    public function update(Request $request, $id)
    {
        $new_data = Imunisasi::query()->find($id);
        $new_data->dpt_1 = $request->dpt_1;
        $new_data->dpt_2 = $request->dpt_2;
        $new_data->dpt_3 = $request->dpt_3;
        $new_data->bayi_lahir = $request->bayi_lahir;
        $new_data->id_jatim = $request->id_jatim;
        $new_data->tahun = $request->tahun;
//        dd($new_data);
        try {
            $new_data->saveOrFail();
        } catch (\Throwable $e) {
            redirect('/');
        }
        return redirect('/dataimunisasi');
    }

    public function destroy($id)
    {
        $new_data = Imunisasi::query()->find($id);
        try {
            $new_data->delete();
        } catch (\Exception $exception) {
            //
        }
        return redirect('/dataimunisasi');
    }
}
