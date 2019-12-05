


@routes
<script src="/assets/dashboard/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/assets/dashboard/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/dashboard/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="/assets/dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Plugin for the momentJs  -->
<script src="/assets/dashboard/assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="/assets/dashboard/assets/js/plugins/sweetalert2.js"></script>
<!-- Forms Validations Plugin -->
<script src="/assets/dashboard/assets/js/plugins/jquery.validate.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="/assets/dashboard/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="/assets/dashboard/assets/js/plugins/bootstrap-selectpicker.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="/assets/dashboard/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/assets/dashboard/assets/js/plugins/jasny-bootstrap.min.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="/assets/dashboard/assets/js/plugins/jquery-jvectormap.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/assets/dashboard/assets/js/plugins/nouislider.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="/assets/dashboard/assets/js/plugins/arrive.min.js"></script>
<!-- Chartist JS -->
<script src="/assets/dashboard/assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/dashboard/assets/js/plugins/bootstrap-notify.js"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{ mix('/js/app.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
<script>
    (function () {
        var e = document.getElementById("fooDiv");
        e.parentNode.removeChild(e);
    })();
</script>
@if(config('app.env') != 'local')
@endif

@section('script')

@show
