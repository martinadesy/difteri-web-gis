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



                            <table class="table table-flush" id="myTable">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kabupaten</th>
                                    <th>Nilai Kerawanan</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody id="tableBody">
                                <td colspan="4" class="center">Memuat ...</td>
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



            $.ajax(
                {
                    type: "GET",
                    url: 'http://localhost:5000/nilai-kerawanan/all',
                    contentType: "application/json;",
                    dataType: "json",
                    cache: true,
                    success: function (data)
                    {
                        let trHTML;
                        let no = 1;
                        kerawanan = data.kerawanan;
                        $.each(kerawanan, function (i, item) {
                            //trHTML += '<tr>';
                            trHTML += '<tr><td>' + no + '</td>';
                            trHTML += '<td>' + item.kabupaten[0] + '</td>';
                            trHTML += '<td>' + item.kerawanan  + '</td>';
                            trHTML += '<td>' + item.status + '</td></tr>';
                            //trHTML += '</tr>';
                            no++;
                        });

                         //console.log(kerawanan);

                        $('#tableBody').empty().append(trHTML);
                        oTable = $('#myTable').DataTable();
                    },

                    error: function (msg) {
                        alert(msg.responseText);
                    }
                });

    </script>
@endsection