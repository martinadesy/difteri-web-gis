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
                                {{--<tfoot>--}}
                                {{--@foreach($kasus as $data)--}}


                                {{--<tr>--}}

                                {{--<th>--}}
                                {{--{{$data->id}}--}}
                                {{--</th>--}}
                                {{--<th>{{$data->getJatim->nama_kab}}</th>--}}
                                {{--<th>{{$data->jml_penderita}}</th>--}}
                                {{--<th>{{$data->kematian}}</th>--}}
                                {{--<th>--}}
                                {{--<button type="button" class="btn btn-primary" data-toggle="modal"--}}
                                {{--data-target="#editModal{{ $data->id }}">--}}
                                {{--<i class="fas fa-pencil-alt"></i>--}}
                                {{--</button>--}}

                                {{--<button type="button" class="btn btn-danger" data-toggle="modal"--}}
                                {{--data-target="#deleteModal{{ $data->id }}">--}}
                                {{--<i class="fas fa-trash-alt"></i>--}}
                                {{--</button>--}}


                                {{--<div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1"--}}
                                {{--role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                                {{--<div class="modal-dialog rounded bg-gradient-neutral" role="document">--}}
                                {{--<div class="modal-content bg-transparent">--}}
                                {{--<div class="modal-header bg-gradient-red">--}}
                                {{--<h5 class="modal-title text-white">--}}
                                {{--Apakah anda yakin ingin menghapus data ini? </h5>--}}
                                {{--<button type="button" class="close" data-dismiss="modal"--}}
                                {{--aria-label="Close">--}}
                                {{--<span aria-hidden="true" class="text-white">&times;</span>--}}
                                {{--</button>--}}
                                {{--</div>--}}
                                {{--<div class="modal-body bg-gradient-pink text-white">--}}
                                {{--<div class="text-center">--}}
                                {{--<a href="{{ route("datakasus", ["id" => $data->id]) }}"--}}
                                {{--class="btn btn-white mt-4">{{ __('Ya, yakin') }}</a>--}}
                                {{--<button type="button" data-dismiss="modal"--}}
                                {{--class="btn btn-white mt-4">{{ __('Tidak') }}</button>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</th>--}}
                                {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--</tfoot>--}}

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