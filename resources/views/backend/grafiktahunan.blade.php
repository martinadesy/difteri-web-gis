@extends('layout.main')
@section('content')
    <html>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <div id="container" style="min-width: 500px; max-width: 1100px; height: auto; margin: 0 auto"></div>
    </html>

    <script type="text/javascript">

        Highcharts.chart('container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Tingkat Kerawanan Difteri di Jawa Timur'
            },
            subtitle: {
                text: '38 Kabupaten</a>'
            },
            xAxis: {
                categories: ['PACITAN',
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
                    'SUMENEP'],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Population (millions)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                valueSuffix: ' millions'
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
            series: [{
                name: 'Year 1800',
                data: [107, 31, 635, 203, 2]
            }, {
                name: 'Year 1900',
                data: [133, 156, 947, 408, 6]
            }, {
                name: 'Year 2000',
                data: [814, 841, 3714, 727, 31]
            }, {
                name: 'Year 2016',
                data: [1216, 1001, 4436, 738, 40]
            }]
        });
    </script>
@endsection