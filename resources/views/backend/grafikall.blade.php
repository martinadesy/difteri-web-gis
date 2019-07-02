@extends('layout.main')
@section('content')
    <div class="card bg-gradient-white">
        <div class="card-body">
            <div id="container"
                 style="min-width: 500px; min-height: 600px; height: auto; margin: 0 auto; padding-right: 20px"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script type="text/javascript">
        $.ajax({
            type: 'GET',
            url: "http://localhost:5000/nilai-kerawanan/all",
            dataType: 'json',
            success: function (data) {
                let kabupaten = ['PACITAN',
                    'PONOROGO',
                    'TRENGGALEK',
                    'TULUNGAGUNG',
                    'LUMAJANG',
                    'BONDOWOSO',
                    'PASURUAN',
                    'JOMBANG',
                    'NGANJUK',
                    'MADIUN',
                    'MAGETAN',
                    'NGAWI',
                    'BOJONEGORO',
                    'TUBAN',
                    'LAMONGAN',
                    'BANGKALAN',
                    'PAMEKASAN',
                    'KEDIRI (KOTA)',
                    'BLITAR (KOTA)',
                    'MALANG (KOTA)',
                    'PROBOLINGGO (KOTA)',
                    'PASURUAN (KOTA)',
                    'MOJOKERTO (KOTA)',
                    'MADIUN (KOTA)',
                    'SURABAYA (KOTA)',
                    'BATU (KOTA)',
                    'BLITAR',
                    'KEDIRI',
                    'MOJOKERTO',
                    'BANYUWANGI',
                    'GRESIK',
                    'JEMBER',
                    'MALANG',
                    'PROBOLINGGO',
                    'SAMPANG',
                    'SIDOARJO',
                    'SITUBONDO',
                    'SUMENEP'];
                let no = 1;
                kerawanan = data.kerawanan;
                let series_data = [];
                $.each(kerawanan, function (i, item) {
                    series_data.push(item.kerawanan)
                });
                let series = {"data": series_data};
                console.log(series);

                Highcharts.chart('container', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Tingkat Kerawanan Kumulatif Difteri di Jawa Timur'
                    },
                    subtitle: {
                        text: '38 Kabupaten'
                    },
                    xAxis: {
                        categories: kabupaten,
                        title: {
                            text: null
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Kerawanan (nilai)',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    tooltip: {
                        valueSuffix: ' '
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor:
                            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [series]
                });
            }
        });
    </script>
@endsection