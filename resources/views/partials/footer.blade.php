<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('public/')}}/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="{{asset('public/')}}/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
<!-- Optional JS -->
<script src="{{asset('public/')}}/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->

<script src="{{asset('public/')}}/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

<script src="{{asset('public/')}}/assets/vendor/select2/dist/js/select2.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/nouislider/distribute/nouislider.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/quill/dist/quill.min.js"></script>
<script src="{{asset('public/')}}/assets/vendor/dropzone/dist/min/dropzone.min.js"></script>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<script src="{{asset('public/')}}/assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>


<script src="{{asset('public/')}}/assets/js/argon.min-v=1.0.0.js"></script>
<input type='hidden' name='_token' value='{{ csrf_token() }}'>

<script src="{{asset('public/core/ajax.js')}}"></script>
<script src="{{asset('public/core/datatable.js')}}"></script>

@yield('scripts')
<script>
    baseURL = '{{url("/")}}';
</script>

</body>

</html>