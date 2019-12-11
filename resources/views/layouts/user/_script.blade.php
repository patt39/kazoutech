@routes
<!-- Core -->
<script src="/assets/vendor_site/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/assets/vendor_site/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/vendor_site/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/vendor_site/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="/assets/vendor_site/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/assets/vendor_site/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the Carousel, full documentation here: http://jedrzejchalubek.com/ -->
<script src="/assets/vendor_site/js/plugins/glide.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://flatpickr.js.org/ -->
<script src="/assets/vendor_site/js/plugins/moment.min.js"></script>
<!--	Plugin for Select, full documentation here: https://joshuajohnson.co.uk/Choices/ -->
<script src="/assets/vendor_site/js/plugins/choices.min.js" type="text/javascript"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://flatpickr.js.org/ -->
<script src="/assets/vendor_site/js/plugins/datetimepicker.js" type="text/javascript"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/assets/vendor_site/js/plugins/jasny-bootstrap.min.js"></script>
<!-- Plugin for Headrom, full documentation here: https://wicky.nillia.ms/headroom.js/ -->
<script src="/assets/vendor_site/js/plugins/headroom.min.js"></script>
<!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Notifications Plugin    -->
<script src="/assets/dashboard/assets/js/plugins/bootstrap-notify.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="/assets/dashboard/assets/js/plugins/sweetalert2.js"></script>
<script src="/assets/vendor_site/js/argon-design-system.min.js?v=1.0.0" type="text/javascript"></script>
<script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
<script src="{{ mix('/js/vuejs/axios.js') }}"></script>
<script src="{{ mix('/js/vuejs/app.js') }}"></script>
<script>
    window.TrackJS &&
    TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-design-system-pro"
    });
</script>
@if(config('app.env') != 'local')
@endif

@section('script')

@show
