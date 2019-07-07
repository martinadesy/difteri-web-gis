@extends('layout.main')
@section('content')

    <div class="card bg-gradient-default">
        <div class="card-body">
            <div class="dropdown right" style="z-index: 9999">

                <label class="dropdown btn-danger" for="formTahun">

                    <select class="dropdown-content right" id="formTahun" onchange="updateMaps(this.value)">
                        @for($i = 2013 ; $i <= date('Y'); $i += 1)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </label>
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
        var data_geojson;
        var mymap;
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
        function updateMaps(tahun) {

            $.ajax({
                type: 'GET',
                url: 'http://localhost:5000/nilai-kerawanan/' + tahun,
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    $.each(data.data, function (i, item) {
                        // console.log(item);
                        data_geojson=L.geoJson(JSON.parse(item.kabupaten[1]), {
                            style: function (feature) {
                                return {
                                    color: getColor(item.status.toLowerCase()),
                                    weight: 0.4,
                                    opacity: 0.6,
                                    fillColor: item.color,
                                    fillOpacity: 0.6
                                };
                            },
                            onEachFeature: function (feature, layer) {
                                layer.bindPopup("<div class='row col-12 center' style='height: 5px; background-color: blue;'></div><div class='row'>Kabupaten : " + item.kabupaten[0] + "</div><div class='row'>" + "Kerawanan : " + item.kerawanan + "</div><div class='row'>" + "Status : " + item.status + "</div>");
                            }
                        }).addTo(mymap);
                    });
                    try{
                        mymap.removeLayer(data_geojson);
                    }catch (e) {
                        console.log(e)
                    }
                }
            });
        }

        updateMaps(2013);
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