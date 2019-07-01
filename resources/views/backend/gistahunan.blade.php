@extends('layout.main')
@section('content')
    <div class="card bg-gradient-default">
        <div class="card-body">
            <div class="dropdown right" style="z-index: 9999">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                    Tahun
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">2013</a>
                    <a class="dropdown-item" href="#">2014</a>
                    <a class="dropdown-item" href="#">2015</a>
                    <a class="dropdown-item" href="#">2016</a>
                    <a class="dropdown-item" href="#">2017</a>
                    <a class="dropdown-item" href="#">2018</a>
                </div>
            </div>
            <br><br>
            <div id="mapid"></div>
        </div>
    </div>



@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#tabel-administrasi').DataTable({
                language: {
                    paginate: {
                        previous: "<i class='ni ni-bold-left'></i>",
                        next: "<i class='ni ni-bold-right'></i>"
                    }
                }
            });
        });
    </script>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
            integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
            crossorigin=""></script>
    <script>
        mymap = L.map('mapid').setView([-6.909455, 111.3381909], 7);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        }).addTo(mymap);

        function getColor(kondisi) {
            if (kondisi === "tinggi") {
                return '#ff0000'
            }
            if (kondisi === "sedang") {
                return '#ffff00'
            }
            if (kondisi === "rendah") {
                return '#00ff00'
            }
        }
        function style(feature) {
            return {
                fillColor: getColor(feature.properties.VALUE),
                weight: 1,
                opacity: 0.4,
                color: '#000',
                fillOpacity: 0.5
            };
        }
        // let data = [];
        // L.geoJson(data, {
        //     style: style,
        //     onEachFeature: function (feature, layer) {
        //         layer.bindPopup("<div><div class='row'><img width=128 height=128 src=" + feature.properties.NOMOR_PETA + ".jpg></div><div class=row><center><a href=http://tides.big.go.id/DEMNAS/download.php?download_file=DEMNAS_" + feature.properties.NOMOR_PETA + "_v1.0.tif>DEMNAS_" + feature.properties.NOMOR_PETA + "</a></center></div></div>");
        //     }
        // }).addTo(mymap);


        $.ajax({
            type: 'GET',
            url: 'http://localhost:5000/nilai-kerawanan/' + tahun,
            dataType: "json",
            success: function(data)
            {
                // console.log(data);
                $.each(data.kerawanan, function(i, item) {
                    // console.log(item);
                    L.geoJson(JSON.parse(item.kabupaten[1]),{
                        style: function(feature){
                            return { color: getColor(item.status.toLowerCase()), weight: 0.4, opacity: 0.6, fillColor: item.color, fillOpacity: 0.6 };
                        },
                        onEachFeature: function( feature, layer ){
                            layer.bindPopup("<div class='row col-12 center' style='height: 5px; background-color: blue;'></div><div class='row'>Kabupaten : " + item.kabupaten[0] + "</div><div class='row'>" + "Kerawanan : " + item.kerawanan + "</div><div class='row'>" + "Status : " + item.status + "</div>");
                        }
                    }).addTo(mymap);
                });
            }
        });

        {{--updateMap(({{ date('Y') }} - 5), {{ date('Y') }});--}}
    </script>
@endsection