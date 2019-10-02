<?php

namespace App\Http\Controllers;

use App\Jatim;
use App\Kasus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GISController extends Controller
{
    public function gis()
    {
            $params = [
                'gid' => Jatim::all()
            ];

        return view('/backend.gis', $params);
    }

    public function showgis(Request $request){
//        $idLahan=3;
        $users = Kasus::select(DB::raw("ST_AsGeoJSON(ST_Transform(jatim.geom,4326))::json As geometry"),'kasus.jml_penderita'
            ,'kasus.kematian', 'kasus.id_jatim')
            ->join('jatim','gid','=','id_jatim')
            ->get();
        $original_data=json_decode($users,true);
        foreach ($original_data as $key =>$value){
            $features[]=array(
                'type' => 'Feature',
                'geometry'=>json_decode($value["geometry"], true),
                'properties'=>array('jml_penderita'=>$value['jml_penderita'],'kematian'=>$value['kematian'],'id_jatim'=>$value['id_jatim'],)
//                    'desa'=>ucfirst(strtolower($value['desa'])),'kecamatan'=>ucfirst(strtolower($value['kecamatan'])),
//                    'kabupaten'=>ucfirst(strtolower($value['kabupaten'])))
            );
        };
        $allfeatures = array('type' => 'FeatureCollection', 'features' => $features);
//        return json_encode($allfeatures, JSON_PRETTY_PRINT);
////        return json_encode($users, JSON_PRETTY_PRINT);
//        $geojson=$original_data[0];
//        $geojson2=json_decode($geojson["geometry"], true);
////        $getCoordinates=$geojson2["coordinates"][0][1];
//        $getCoordinates2=$getCoordinates[0];
        $data[]=[
//            ''=>$geojson["sk_lahan"],
//            'longitude'=>$getCoordinates[0],
//            'latitude'=>$getCoordinates[1],
            'geojson'=>$allfeatures
        ];
//        dd($idLahan);
        return response()->json($data);
    }
}
