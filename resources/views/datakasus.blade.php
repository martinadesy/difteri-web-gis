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
                                                <button align="left" type="button" class="btn btn-primary">
                                                    <i class="fa fa-plus"></i>
                                                    Add Data
                                                </button>
                                            </a>
                                        </div>

                                    <div class="col text-right">
                                        <div class="dropdown-menu-sm-right col-sm-12 col-md-0">
                                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Periode
                                            </button>

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
                                    <th>Nama Kabupaten</th>
                                    <th>Kasus</th>
                                    <th>Kematian</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kasus as $data)
                                    <tr>
                                        <td>
                                            {{$data->id}}
                                        </td>
                                        <td>{{$data->getJatim->nama_kab}}</td>
                                        <td>{{$data->jml_penderita}}</td>
                                        <td>{{$data->kematian}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    onclick="loadModal(this)" target="/update" data-target="{{ $data->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>

                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#deleteModal{{ $data->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>


                                            <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1"
                                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog rounded bg-gradient-neutral" role="document">
                                                    <div class="modal-content bg-transparent">
                                                        <div class="modal-header bg-gradient-red">
                                                            <h5 class="modal-title text-white">
                                                                Apakah anda yakin ingin menghapus data ini? </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true" class="text-white">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body bg-gradient-pink text-white">
                                                            <div class="text-center">
                                                                <a href="{{ route("destroy", ["id" => $data->id]) }}"
                                                                   class="btn btn-white mt-4">{{ __('Ya, yakin') }}</a>
                                                                <button type="button" data-dismiss="modal"
                                                                        class="btn btn-white mt-4">{{ __('Tidak') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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

        $(document).ready(function () {
            $('#form-konten').submit(function () {
                var data = getFormData('form-konten');
                ajaxTransfer("{{ url('crudkasus')}}", data, '#result-form-konten');
            })
        })

        function deleteData(id) {
            var data = new FormData();
            data.append('id', id);

            modalConfirm("Konfirmasi", "Are you sure to delete this data ?", function () {
                ajaxTransfer("/backend/extension-agency/district/delete", data, "#modal-output");
            })
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