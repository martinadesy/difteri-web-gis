@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col">

            <div class="card card-minimal">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="mb-0">Nilai Kerawanan</h5>
                    <p class="text-sm mb-0">

                    </p>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

                                <div class="row">
                                    <div class="text-left col-sm-12 col-md-6">
                                        <div class="dropdown col-sm-12 col-md-0">
                                            <label class="dropdown btn-danger" for="formTahun">
                                                <select class="dropdown-content right" id="formTahun" onchange="updateTable(this.value)">
                                                    @for($i = 2013 ; $i <= date('Y'); $i += 1)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <table class="table table-flush" id="myTable">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kabupaten</th>
                                    <th>Korban</th>
                                    <th>Meninggal</th>
                                    <th>DPT 1</th>
                                    <th>DPT 2</th>
                                    <th>DPT 3</th>
                                    <th>Penduduk</th>
                                    <th>Kelembaban</th>
                                    <th>Nilai</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <td colspan="11" class="center">Memuat ...</td>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>



@endsection
@section('scripts')
    <script>


        function updateTable(tahun) {
            $.ajax(
                {
                    type: "GET",
                    url: 'http://localhost:5000/nilai-kerawanan/' + tahun,
                    contentType: "application/json;",
                    dataType: "json",
                    cache: true,
                    success: function (data)
                   {
                        let trHTML;
                        let no = 1;
                        data = data.data;
                        $.each(data, function (i, item) {
                            //trHTML += '<tr>';
                            trHTML += '<tr><td>' + no + '</td>';
                            trHTML += '<td>' + item.kabupaten[0] + '</td>';
                            trHTML += '<td>' + item.rasio_kasus + '</td>';
                            trHTML += '<td>' + item.rasio_kematian + '</td>';
                            trHTML += '<td>' + item.rasio_dpt1 + '</td>';
                            trHTML += '<td>' + item.rasio_dpt2  + '</td>';
                            trHTML += '<td>' + item.rasio_dpt3  + '</td>';
                            trHTML += '<td>' + item.rasio_penduduk + '</td>';
                            trHTML += '<td>' + item.rasio_kelembaban  + '</td>';
                            trHTML += '<td>' + item.kerawanan  + '</td>';
                            trHTML += '<td>' + item.status + '</td></tr>';
                            //trHTML += '</tr>';
                            no++;
                        });

                        // console.log(data);

        $('#tableBody').empty().append(trHTML);
        oTable = $('#myTable').DataTable();
        },

        error: function (msg) {
            alert(msg.responseText);
        }
        });
        }

        updateTable(2013);



    </script>
@endsection