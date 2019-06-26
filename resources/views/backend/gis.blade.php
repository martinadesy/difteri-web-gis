@extends('layout.main')
@section('content')
    <div style="height: 500px;" id="mapid"></div>
    <br>


    <!-- Make sure you put this AFTER Leaflet's CSS -->
    {{--<script src="assets/js/leaflet.ajax.js"></script>--}}
@endsection
@section('scripts')
    <script type="text/javascript"> var mymap = L.map('mapid').setView([-6.909455, 111.3381909], 7);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        }).addTo(mymap);

        $.ajax({ // ini perintah syntax ajax untuk memanggil vektor
            type: 'GET',
            url: '{{url('gis-showgis')}}', // INI memanggil link request yang sebelumnya telah di buat
            dataType: "json",
            success: function(response){
                var data=response[0];
                var datageo=data["geojson"];
                var geojson=data["geojson"];
                console.log(data);
                console.log(geojson);
                L.geoJson(geojson,{
                    style: function(feature){
                        var Style1
                        return { color: "#cc3f39" }; // ini adalah style yang akan digunakan
                    },
                    // MENAMPILKAN POPUP DENGAN ISI BERDASARKAN ATRIBUT KAB_KOTA
                    onEachFeature: function( feature, layer ){
                        // if (feature.properties.status_verif===1){
                            layer.bindPopup(
                                // "<div class='popup-header'> No. Sk Lahan : " + feature.properties.sk_lahan + "</div>"+
                                // "<div class='popup-header'>Pemilik Lahan : "+ feature.properties.name+"</div>"+
                                "<div class='popup-body'> Penderita : "+ feature.properties.jml_penderita+"</div>"+
                                "<div class='popup-body'> Kematian : "+ feature.properties.kematian+"</div>"+
                                "<div class='popup-body'> Kabupaten : "+ feature.properties.id_jatim+"</div>"+
                                "<center>"+
                                "</center>")
                        //     )
                        // }
                        // else{
                        //     layer.bindPopup(
                        //         // "<div class='popup-header'> No. Sk Lahan : " + feature.properties.sk_lahan + "</div>"+
                        //         // "<div class='popup-header'>Pemilik Lahan : "+ feature.properties.user_name+"</div>"+
                        //         "<div class='popup-body'> Penderita : "+ feature.properties.jml_penderita+"</div>"+
                        //         "<div class='popup-body'> Kematian : "+ feature.properties.kematian+"</div>"+
                        //         "<div class='popup-body'> Kabupaten : "+ feature.properties.id_jatim+"</div>"+
                        //         "<center>"+
                        //         "<br><a onclick='verifData("+feature.properties.id+")' class='btn btn-success' title='Verifikasi Data' style='color: #ffffff'><i class='fas fa-certificate'></i>Verifikasi Data</a>" +
                        //         "</center>"
                        //     )
                        // }
                    }
                }).addTo(mymap);  // di akhir selalu di akhiri dengan perintah ini karena objek akan ditambahkan ke map

            }
        });
    </script>
    @endsection