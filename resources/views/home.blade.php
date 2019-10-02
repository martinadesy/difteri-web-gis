@extends('layout.main')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-info border-0">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Kabupaten</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">38</span>
                            <div class="progress progress-xs mt-3 mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="#" class="text-nowrap text-white font-weight-600">See details</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-danger border-0">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Tinggi</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">21</span>
                            <div class="progress progress-xs mt-3 mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="#" class="text-nowrap text-white font-weight-600">See details</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-success border-0">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Sedang</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">10</span>
                            <div class="progress progress-xs mt-3 mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="#" class="text-nowrap text-white font-weight-600">See details</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-gradient-default border-0">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Rendah</h5>
                            <span class="h2 font-weight-bold mb-0 text-white">7</span>
                            <div class="progress progress-xs mt-3 mb-0">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="a">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                        <a href="#" class="text-nowrap text-white font-weight-600">See details</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="card-deck flex-column flex-xl-row">
        <div class="card bg-gradient-default">
            <!-- Card image -->
            <img class="card-img-top" src="{{asset('public/assets/img/brand/info1.jpg')}}" alt="Image placeholder">
            <!-- Card body -->
            <div class="card-body">
                <h5 class="h2 card-title mb-0 text-white">Kenali Gejala Difteri</h5>
                <small class="text-muted text-white">by Detik Health on 06 Nov 2018 at 16:54 WIB</small>
                <p class="card-text mt-4 text-white">Hampir semua penyakit infeksi menyebabkan gejala demam, tidak terkecuali difteri.</p>
                <a href="#!" class="btn btn-link px-0">View article</a>
            </div>
        </div>
        <div class="card">
            <!-- Card image -->
            <img class="card-img-top" src="{{asset('public/assets/img/brand/info2.png')}}" alt="Image placeholder">
            <!-- List group -->
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Demam lebih dari 38C</li>
                <li class="list-group-item">Mudah berdarah di faring, laring atau tansil</li>
                <li class="list-group-item">Sakit saat menelan</li>
            </ul>
            <!-- Card body -->
            <div class="card-body">
                <h3 class="card-title mb-3">Difteri dapat dicegah</h3>
                <p class="card-text mb-4">Difteri disebabkan oleh infeksi bakteri bernama Corynebacterium Diphteriae pertama kali diidentifikasi oleh ilmuwan bernama F. Loeffler sekitar tahun 1880. Bakteri difteri ini bisa menyebar lewat droplet (percikan halus liur) hingga kontak fisik langsung.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <!-- Progress track -->
    </div>
@endsection