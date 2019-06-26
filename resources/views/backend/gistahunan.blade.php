@extends('layout.main')
@push('css-section')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>
    <style>
        #mapid { height: 550px; }
    </style>
@endpush
@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="dropdown" style="z-index: 9999">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Pilih yang akan ditampilkan
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Peta Kerawanan Longsor</a>
                                        <a class="dropdown-item" href="#">Peta Riwayat Longsor</a>
                                        <a class="dropdown-item" href="#">Peta Curah Hujan</a>
                                        <a class="dropdown-item" href="#">Peta Jenis Tanah</a>
                                        <a class="dropdown-item" href="#">Peta Kemiringan Lahan</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group input-group-alternative col-md ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input id="formStartTahun" class="form-control" type="number"
                                           value="{{ date("Y") - 5 }}" onchange="updateMap(this.value, document.getElementById('formEndTahun').value)">
                                </div>
                                <div class="input-group input-group-alternative col-md ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input id="formEndTahun" class="form-control" type="number"
                                           value="{{ date("Y") }}" onchange="updateMap(document.getElementById('formStartTahun').value, this.value)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="divMap">
                        <div id="mapid"></div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection