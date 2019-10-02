function loadGrafikTotalTransaksi() {
    ajaxTransfer('/site/get-data-total-transaksi', {}, function (response) {
        var data = JSON.parse(response);
        var seriesData = [], key;

        for (key in data) {
            if (data.hasOwnProperty(key)) {
                seriesData.push([key, data[key]]);
            }
        }

        $('#output-grafik-total-transaksi').highcharts({
            chart: {type: 'column'},
            title: {text: ''},
            xAxis: {type: 'category'},
            yAxis: {
                min: 0,
                title: {text: 'Jumlah Transaksi'}
            },
            legend: {enabled: false},
            credits: {enabled: false},
            series: [{
                name: 'Jenis Transaksi',
                data: seriesData
            }]
        });
    }, false, false)
}

$(document).ready(function () {
    loadGrafikTotalTransaksi();
});