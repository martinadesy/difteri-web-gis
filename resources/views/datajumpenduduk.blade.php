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
                                        <a onclick="loadModal(this)" target="process/crudkasus" title="Tambah Data">
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
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">2013</a>
                                                <a class="dropdown-item" href="#">2014</a>
                                                <a class="dropdown-item" href="#">2015</a>
                                                <a class="dropdown-item" href="#">2016</a>
                                                <a class="dropdown-item" href="#">2017</a>
                                                <a class="dropdown-item" href="#">2018</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-flush" id="datatable-buttons">
                                <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kabupaten</th>
                                    <th>Jumlah Penduduk</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tfoot>
                                @foreach($penduduk as $data)
                                    <tr>
                                        <th>{{$data->id}}</th>
                                        <th>{{$data->getJatim->nama_kab}}</th>
                                        <th>{{$data->jml_penduduk}}</th>
                                        <th>
                                            <button type="button" class="btn btn-success btn-icon-only">
                                                <span class="btn-inner--icon">
                                                    <i class="ni ni-ruler-pencil">
                                                    </i>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-icon-only">
                                                <span class="btn-inner--icon">
                                                    <i class="ni ni-fat-remove">
                                                    </i>

                                                </span>
                                            </button>
                                        </th>
                                    </tr>
                                @endforeach
                                </tfoot>

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
        function deleteData(id) {
            var data = new FormData();
            data.append('id', id);

            modalConfirm("Konfirmasi", "Are you sure to delete this data ?", function () {
                ajaxTransfer("/backend/extension-agency/district/delete", data, "#modal-output");
            })
        }
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