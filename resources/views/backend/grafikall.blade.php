@extends('layout.main')
@section('content')
    <!-- Highcharts -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <!-- Chartist JS -->
    <script src="{{asset('public/template')}}/vendor/chartist/js/chartist.min.js"></script>
    <script src="{{asset('public/template')}}/vendor/chartist/js/chartist-tooltip.js"></script>
    <script src="{{asset('public/template')}}/vendor/chartist/js/custom/custom-area-chart2.js"></script>
    <script src="{{asset('public/template')}}/vendor/chartist/js/custom/custom-compare-line.js"></script>
    <!-- Peity JS -->
    <script src="{{asset('public/template')}}/vendor/peity/peity.min.js"></script>
    <script src="{{asset('public/template')}}/vendor/peity/custom-peity.js"></script>

    <!-- Circliful js -->
    <script src="{{asset('public/template')}}/vendor/circliful/circliful.min.js"></script>
    <script src="{{asset('public/template')}}/vendor/circliful/circliful.custom.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: "{{url('backend/dashboard/all-transaction')}}",
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    getTransactionFraud(data);
                    getFraudUser(data);
                    getIpFraud(data);
                    $("#deviceCount").text(data.countData.deviceCount)
                    $("#productCount").text(data.countData.productCount)
                    $("#userCount").text(data.countData.userCount)
                    $("#transactionCount").text(data.countData.transactionCount)
                    $("#transactionFraud").text(data.countData.transactionFraud)
                    $("#transactionNotFraud").text(data.countData.transactionNotFraud)

                }
            });
        });
        setInterval(function () {

            $.ajax({
                type: 'GET',
                url: "{{url('backend/dashboard/all-transaction')}}",
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    getTransactionFraud(data);
                    getFraudUser(data);
                    getIpFraud(data);
                    $("#deviceCount").text(data.countData.deviceCount)
                    $("#productCount").text(data.countData.productCount)
                    $("#userCount").text(data.countData.userCount)
                    $("#transactionCount").text(data.countData.transactionCount)
                    $("#transactionFraud").text(data.countData.transactionFraud)
                    $("#transactionNotFraud").text(data.countData.transactionNotFraud)

                }
            });

        },30000)
        function getTransactionFraud(data) {
            Highcharts.chart('container', {
                chart: {
                    type: 'areaspline'
                },
                title: {
                    text: 'Transaksi Per Tahun {{date('Y')-1}}-{{date('Y')}}'
                },
                legend: {
                    layout: 'vertical',
                    align: 'left',
                    verticalAlign: 'top',
                    x: 150,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor:
                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
                },
                xAxis: {
                    categories: [
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    ],
                    plotBands: [{ // visualize the weekend
                        from: 4.5,
                        to: 6.5,
                        color: 'rgba(68, 170, 213, .2)'
                    }]
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    }
                },
                tooltip: {
                    shared: true,
                    valueSuffix: ' transaksi'
                },
                credits: {
                    enabled: false
                },
                plotOptions: {
                    areaspline: {
                        fillOpacity: 0.5
                    }
                },
                series: [{
                    name: 'Fraud',
                    data: data.isFraud
                }, {
                    name: 'Tidak Fraud',
                    data: data.notFraud
                }]
            });
        }
        function getFraudUser(data) {
            Highcharts.chart('container1', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Pengguna Melakukan Transaksi Fraud'
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    }

                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.0f}'
                        }
                    }
                },

                tooltip: {
                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> dari total<br/>'
                },

                series: [
                    {
                        name: "Transaksi",
                        colorByPoint: true,
                        data:data.fraudUser
                    }
                ],
            });
        }

        function getIpFraud(data) {
            // Build the chart
            Highcharts.chart('container2', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Fraud Berdasarkan IP Address'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.0f}</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'IP Address',
                    colorByPoint: true,
                    data: data.ipFraud
                }]
            });
        }



    </script>
@endsection