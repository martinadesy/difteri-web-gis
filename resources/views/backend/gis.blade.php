@extends('layout.main')
@section('content')

<style>
    .legend {
        line-height: 18px;
        color: #555;
    }
    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }
</style>

    <div class="card bg-gradient-default">
        <div class="card-body">
            <h3 class="card-title text-white">GIS Kumulatif</h3>
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

        function getColor(status) {
            if (status === "tinggi") {
                return '#ff0000'
            }
            if (status === "sedang") {
                return '#ffff00'
            }
            if (status === "rendah") {
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
            url: 'http://localhost:5000/nilai-kerawanan/all',
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

        var legend = L.control({position: 'bottomright'});

        legend.onAdd = function (map) {
            var div = L.DomUtil.create('div', 'info legend'),
                //grades = [0, 10, 20, 50, 100, 200, 500, 1000],
                grades = ["rendah","sedang","tinggi"], //pretty break untuk 8
                labels=[];
            for (var i = 0; i < grades.length; i++) {
                labels.push(
                    '<i style="background:' + getColor(grades[i]) + '"></i>'+grades[i]+'<br>');
            }
            div.innerHTML = '<h4>Legenda:</h4><br>'+labels.join('<br>');
            return div;
        };
        legend.addTo(mymap);

        {{--updateMap(({{ date('Y') }} - 5), {{ date('Y') }});--}}
    </script>
@endsection