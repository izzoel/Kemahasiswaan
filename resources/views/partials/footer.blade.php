<!-- jQuery -->

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js" integrity="sha384-4R7RSJHvbRaRmHEDOsSuOqEuTnbdNjp3zqAqYkE4FQ6iih4/z8Er1kBtgFsaMgmN"
    crossorigin="anonymous"></script>

<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
<!-- slick-slider-->
<script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
<!-- aos -->
<script src="{{ asset('plugins/aos/aos.js') }}"></script>
<!-- isotope -->
{{-- <script src="{{ asset('plugins/shuffle/shuffle.min.js') }}"></script> --}}
<!-- Main Script -->
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/sw-login-user.js') }}"></script>


<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
<!-- Chart.js -->
<script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
<!-- gauge.js -->
<script src="{{ asset('vendors/gauge.js/dist/gauge.min.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
<!-- Skycons -->
<script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
<!-- Flot -->
<script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
<!-- Flot plugins -->
<script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
<script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
<!-- DateJS -->
<script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
<script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery 1.9.1 or above -->
{{-- <script src="{{ asset('plugins/dflip/js/libs/jquery.min.js') }}" type="text/javascript"></script> --}}

<!-- Flipbook main Js file -->
<script src="{{ asset('plugins/dflip/js/dflip.min.js') }}" type="text/javascript"></script>
{{-- @include('guest.scripts.script_informasi'); --}}
@include('scripts.script_informasi')
{{-- @include('guest.scripts.script_pedoman'); --}}
@include('guest.scripts.script_modalLanding')
@include('guest.scripts.script_beasiswa');

</html>
