@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col">

            <div class="card card-minimal">
                <!-- Card header -->
                <div class="card-header">
                    <h5 class="mb-0">Data </h5>
                    <p class="text-sm mb-0">

                    </p>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

                                <div class="row">
                                    <div class="text-left col-sm-12 col-md-6">
                                        <a onclick="loadModal(this)" target="/crudkasus" title="Tambah Data">
                                            <button align="left" type="button" class="btn btn-danger">
                                                <i class="fa fa-plus"></i>
                                                Setting Nilai Kerawanan
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col text-right">
                                            <div class="dropdown-menu-sm-right col-sm-12 col-md-0">
                                                <label class="dropdown-menu left" for="formTahun">
                                                    Periode
                                                </label>
                                                <select class="dropdown-item right" id="formTahun" onchange="updateTable(this.value)">
                                                    @for($i = 2013 ; $i <= date('Y'); $i += 1)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                                {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                                                    {{--@for($i = 2013 ; $i <= date('Y'); $i += 1)--}}
                                                        {{--<a class="dropdown-item" value="{{$i}}">{{$i}}</a>--}}
                                                    {{--@endfor--}}
                                                    {{--@for($i = 2013 ; $i <= date('Y'); $i += 1)--}}
                                                    {{--<option </option>--}}
                                                    {{--@endfor--}}
                                                {{--</div>--}}
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
                                    <th>Nilai Kerawanan</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <td colspan="11" class="center">Memuat ...</td>
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

        $(document).ready(function () {
            $('#form-konten').submit(function () {
                var data = getFormData('form-konten');
                ajaxTransfer("{{ url('crudkasus')}}", data, '#result-form-konten');
            })
        });

        function deleteData(id) {
            var data = new FormData();
            data.append('id', id);

            modalConfirm("Konfirmasi", "Are you sure to delete this data ?", function () {
                ajaxTransfer("/backend/extension-agency/district/delete", data, "#modal-output");
            })
        }

        function updateTable(tahun) {
            $.ajax(
                {
                    type: "GET",
                    url: 'http://localhost:5000/nilai-kerawanan/' + tahun,
                    contentType: "application/json;",
                    dataType: "json",
                    cache: true,
                    success: function (data) {
                        let trHTML;
                        let kasus = data.rasio_kasus;
                        let kematian = data.rasio_kematian;
                        let dpt_1 = data.rasio_dpt1;
                        let dpt_2 = data.rasio_dpt2;
                        let dpt_3 = data.rasio_dpt3;
                        let penduduk = data.rasio_penduduk;
                        let kelembaban = data.rasio_kelembaban;
                        let kerawanan = data.kerawanan;
                        for(let i = 0; i < kasus.length; i++) {
                            trHTML += '<tr>';
                            trHTML += '<td>' + (i + 1) + '</td>';
                            trHTML += '<td>' + 0 + '</td>';
                            trHTML += '<td>' + kasus[i] + '</td>';
                            trHTML += '<td>' + kematian[i] + '</td>';
                            trHTML += '<td>' + dpt_1[i] + '</td>';
                            trHTML += '<td>' + dpt_2[i]  + '</td>';
                            trHTML += '<td>' + dpt_3[i]  + '</td>';
                            trHTML += '<td>' + penduduk[i] + '</td>';
                            trHTML += '<td>' + kelembaban[i]  + '</td>';
                            trHTML += '<td>' + kerawanan[i] + '</td>';
                            trHTML += '<td>' + 0 + '</td>';
                            trHTML += '</tr>';
                        }
                        console.log(trHTML);

                        // trHTML += '<td>' + '' + '</td>';
                        // trHTML += '<td>' + item.customurl + '</td>';
                        // trHTML += '<td>' + item.created_at + '</td>';
                        // trHTML += '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewEditModal" data-type="view" data-url="' + item.url + '" data-shorturl="' + item.shorturl + '" data-customurl="' + item.customurl + '" data-updatedat="' + item.updated_at + '"><i class="fas fa-eye"></i></button>';
                        // trHTML += '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewEditModal" data-type="edit" data-id="' + item.id + '" data-urlid="' + item.url_id + '" data-customurl="' + item.customurl + '"><i class="fas fa-pencil-alt"></i></button>';
                        // trHTML += '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="' + item.id + '"><i class="fas fa-trash-alt"></i></button>';
                        // trHTML += '</td></tr>';
                        // $.each(data, function (i, item) {
                        //
                        // });
                        $('#tableBody').empty().append(trHTML);
                        oTable = $('#myTable').DataTable();
                    },

                    error: function (msg) {
                        alert(msg.responseText);
                    }
                });
        }

        updateTable(2013);


        // $(document).ready(function () {
        //     ajaxDataTable('#datatable-buttons', '/backend/extension-agency/district/data-table', [
        //         {data: 'rownum', name: 'rownum'},
        //         {data: 'district_extension_agency_name', name:'district_extension_agency_name'},
        //         {data: 'email', name: 'email'},
        //         {data: 'phone_number', name: 'phone_number'},
        //         {data: 'action', name: 'action', orderable: false, searchable: false}
        //     ]);
        // });

    </script>
@endsection