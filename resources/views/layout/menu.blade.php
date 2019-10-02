<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="{{url(('/home'))}}">
                <img src="{{asset('public/assets/img/brand/logota.png')}}" class="navbar-brand-img" alt="Dinkes">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/home') ? 'active' : '' }}" href="{{url('/home')}}">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('backend/administrator/*') ? 'active' : '' }}" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="ni ni-chart-pie-35 text-info"></i>
                            <span class="nav-link-text">Grafik</span>
                        </a>
                        <div class="collapse {{ request()->is('backend/administrator/*') ? 'show' : '' }}" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{url('/grafiktahunan')}}" class="nav-link">Grafik Tahunan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/grafikall')}}" class="nav-link">Grafik Kumulatif</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('backend/master/*') ? 'active' : '' }}" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                            <i class="ni ni-single-copy-04 text-pink"></i>
                            <span class="nav-link-text">Data</span>
                        </a>
                        <div class="collapse {{ request()->is('backend/master/*') ? 'show' : '' }}" id="navbar-components">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{url('/datakasus')}}" class="nav-link">Data Kasus</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/dataimunisasi')}}" class="nav-link">Data Imunisasi</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/datajumpenduduk')}}" class="nav-link">Data Jumlah Penduduk</a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('backend/setting/*') ? 'active' : '' }}" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
                            <i class="ni ni-archive-2 text-green"></i>
                            <span class="nav-link-text">Proses</span>
                        </a>
                        <div class="collapse {{ request()->is('backend/setting/*') ? 'show' : '' }}" id="navbar-forms">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{url('/prioritas')}}" class="nav-link">Nilai Prioritas</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/bobot')}}" class="nav-link">Nilai Kerawanan Difteri Tahunan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/bobotall')}}" class="nav-link">Nilai Kerawanan Difteri Kumulatif</a>
                                </li>
                                {{--<li class="nav-item">--}}
                                    {{--<a href="{{url('/naturalbreaks')}}" class="nav-link">Natural Breaks</a>--}}
                                {{--</li>--}}
                            </ul>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-penyuluh" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                            <i class="ni ni-map-big text-danger"></i>
                            <span class="nav-link-text">Peta Difteri</span>
                        </a>
                        <div class="collapse" id="navbar-penyuluh">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{url('/gistahunan')}}" class="nav-link">Peta Difteri Tahunan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('/gis')}}" class="nav-link">Peta Difteri Kumulatif</a>
                                </li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/logout')}}">
                            <i class="ni ni-lock-circle-open text-primary"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.nav-link').click(function(){
                $('.nav-link').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>
@endsection

