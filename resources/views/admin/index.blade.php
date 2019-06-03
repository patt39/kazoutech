@extends('inc.admin._main')
@section('title', '| Dashboard Administration')
@section('sectionTitle', 'Dashboard')
@section('style')
@endsection

@section('init')
    <!-- Site wrapper -->
@endsection

@section('content')
    <router-view></router-view>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            //init wizard
            demo.initMaterialWizard();
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();
            demo.initCharts();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            demo.initVectorMap();
        });
    </script>
@endsection