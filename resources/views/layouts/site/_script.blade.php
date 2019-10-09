



<!-- Core -->
<script src="/assets/site/assets/vendor/jquery/jquery.min.js"></script>
<script src="/assets/site/assets/vendor/popper/popper.min.js"></script>
<script src="/assets/site/assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="/assets/site/assets/vendor/headroom/headroom.min.js"></script>
<!--  Plugin for Sweet Alert -->
<script src="/assets/dashboard/assets/js/plugins/sweetalert2.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/dashboard/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Argon JS -->
<script src="/assets/site/assets/js/argon.js?v=1.1.0"></script>
<script src="{{ mix('/js/app.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
@if(config('app.env') != 'local')
@endif

@section('script')

@show
