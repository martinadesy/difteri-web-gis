@include('partials.header')
@include('layout.menu')
<div class="main-content" id="panel">
    <!-- Topnav -->
    @include('layout.topnav')
    <!-- Header -->
    <!-- Header -->
    @include('layout.breadcrumb')
    <!-- Page content -->
    <div class="container-fluid mt--6">
       @yield('content')
        <!-- Footer -->
        @include('layout.footer')
    </div>
</div>
@include('partials.footer')