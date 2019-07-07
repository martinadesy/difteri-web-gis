@extends('layout.main')
@section('content')
    <div class="card">
        <!-- Card header -->
        <div class="card">
            <div class="card-header border-0">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-0">Nilai Prioritas</h3>
                    </div>

                    <div class="col-6 text-right">
                        <button class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="modal"
                                data-target="#editModal" data-original-title="Update Nilai Prioritas Kriteria">
                            <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                            <span class="btn-inner--text">Update Prioritas</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Light table -->
            <table class="table table-flush" id="myTable">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kriteria</th>
                        <th scope="col">Prioritas</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach(\App\AHP_Prioritas::all() as $prioritas)
                            <td >1. </td>
                            <td >Jumlah Penderita</td>
                            <td >{{ getPriority($prioritas->jml_penderita) }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach(\App\AHP_Prioritas::all() as $prioritas)
                            <td >2. </td>
                            <td >Kematian</td>
                            <td >{{ getPriority($prioritas->kematian) }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach(\App\AHP_Prioritas::all() as $prioritas)
                            <td >3. </td>
                            <td >Penduduk</td>
                            <td >{{ getPriority($prioritas->jml_penduduk) }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach(\App\AHP_Prioritas::all() as $prioritas)
                            <td >4. </td>
                            <td >Imunisasi</td>
                            <td >{{ getPriority($prioritas->dpt_1) }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        @foreach(\App\AHP_Prioritas::all() as $prioritas)
                            <td >5. </td>
                            <td >Kelembaban Udara</td>
                            <td >{{ getPriority($prioritas->kelembaban_udara) }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>


            {{--Edit Modal--}}
            <div class="modal fade" id="editModal" tabindex="-1"
                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog rounded bg-gradient-neutral" role="document">
                    <div class="modal-content bg-transparent">
                        <form id="formSection" action="prioritas/update/{{ $ahp_prioritas->id }}" method="POST">
                            @csrf
                            <div class="modal-header bg-gray-dark">
                                <h5 class="modal-title text-white" id="formTitle">
                                    Update Nilai Prioritas </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true" class="text-white">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body bg-transparent text-white">

                                <div class="row">
                                    <div class="form-group col-12">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-gray" style="color: whitesmoke">Jumlah Penderita</span>
                                            </div>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                    name="jml_penderita" style="font-size: medium">
                                                <option {{ ($ahp_prioritas->jml_penderita == 9) ? 'selected' : '' }} value="9">
                                                    Pertama
                                                </option>
                                                <option {{ ($ahp_prioritas->jml_penderita == 7) ? 'selected' : '' }} value="7">
                                                    Kedua
                                                </option>
                                                <option {{ ($ahp_prioritas->jml_penderita == 5) ? 'selected' : '' }} value="5">
                                                    Ketiga
                                                </option>
                                                <option {{ ($ahp_prioritas->jml_penderita == 3) ? 'selected' : '' }} value="3">
                                                    Keempat
                                                </option>
                                                <option {{ ($ahp_prioritas->jml_penderita == 1) ? 'selected' : '' }} value="1">
                                                    Kelima
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-gray" style="color: whitesmoke">Kematian</span>
                                            </div>
                                            <select class="form-control" id="exampleFormControlSelect1" name="kematian"
                                                    style="font-size: medium">
                                                <option {{ ($ahp_prioritas->kematian == 9) ? 'selected' : '' }} value="9">
                                                    Pertama
                                                </option>
                                                <option {{ ($ahp_prioritas->kematian == 7) ? 'selected' : '' }} value="7">
                                                    Kedua
                                                </option>
                                                <option {{ ($ahp_prioritas->kematian == 5) ? 'selected' : '' }} value="5">
                                                    Ketiga
                                                </option>
                                                <option {{ ($ahp_prioritas->kematian == 3) ? 'selected' : '' }} value="3">
                                                    Keempat
                                                </option>
                                                <option {{ ($ahp_prioritas->kematian == 1) ? 'selected' : '' }} value="1">
                                                    Kelima
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-gray" style="color: whitesmoke">Jumlah Penduduk</span>
                                            </div>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                    name="jml_penduduk" style="font-size: medium">
                                                <option {{ ($ahp_prioritas->jml_penduduk == 9) ? 'selected' : '' }} value="9">
                                                    Pertama
                                                </option>
                                                <option {{ ($ahp_prioritas->jml_penduduk == 7) ? 'selected' : '' }} value="7">
                                                    Kedua
                                                </option>
                                                <option {{ ($ahp_prioritas->jml_penduduk == 5) ? 'selected' : '' }} value="5">
                                                    Ketiga
                                                </option>
                                                <option {{ ($ahp_prioritas->jml_penduduk == 3) ? 'selected' : '' }} value="3">
                                                    Keempat
                                                </option>
                                                <option {{ ($ahp_prioritas->jml_penduduk == 1) ? 'selected' : '' }} value="1">
                                                    Kelima
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-gray" style="color: whitesmoke">Imunisasi</span>
                                            </div>
                                            <select class="form-control" id="exampleFormControlSelect1"
                                                    name="imunisasi" style="font-size: medium">
                                                <option {{ ($ahp_prioritas->dpt_1 == 9) ? 'selected' : '' }} value="9">
                                                    Pertama
                                                </option>
                                                <option {{ ($ahp_prioritas->dpt_1 == 7) ? 'selected' : '' }} value="7">
                                                    Kedua
                                                </option>
                                                <option {{ ($ahp_prioritas->dpt_1 == 5) ? 'selected' : '' }} value="5">
                                                    Ketiga
                                                </option>
                                                <option {{ ($ahp_prioritas->dpt_1 == 3) ? 'selected' : '' }} value="3">
                                                    Keempat
                                                </option>
                                                <option {{ ($ahp_prioritas->dpt_1 == 1) ? 'selected' : '' }} value="1">
                                                    Kelima
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-12">
                                        <div class="input-group input-group-alternative mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-gray" style="color: whitesmoke">Kelembaban Udara</span>
                                            </div>
                                            <select class="form-control" name="kelembaban_udara"
                                                    style="font-size: medium">
                                                <option {{ ($ahp_prioritas->kelembaban_udara == 9) ? 'selected' : '' }} value="9">
                                                    Pertama
                                                </option>
                                                <option {{ ($ahp_prioritas->kelembaban_udara == 7) ? 'selected' : '' }} value="7">
                                                    Kedua
                                                </option>
                                                <option {{ ($ahp_prioritas->kelembaban_udara == 5) ? 'selected' : '' }} value="5">
                                                    Ketiga
                                                </option>
                                                <option {{ ($ahp_prioritas->kelembaban_udara == 3) ? 'selected' : '' }} value="3">
                                                    Keempat
                                                </option>
                                                <option {{ ($ahp_prioritas->kelembaban_udara == 1) ? 'selected' : '' }} value="1">
                                                    Kelima
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit"
                                            class="btn mt-4 bg-gray-dark text-white">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>


    </script>
@endsection
