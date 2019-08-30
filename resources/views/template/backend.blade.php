<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Penilaian SD</title>

    <!-- Bootstrap 3.3.7 -->
    {!! Html::style('lte/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('lte/bower_components/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('lte/bower_components/Ionicons/css/ionicons.min.css') !!}
    {!! Html::style('lte/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('lte/dist/css/skins/_all-skins.min.css') !!}
    {!! Html::style('lte/bower_components/morris.js/morris.css') !!}
    {!! Html::style('lte/bower_components/jvectormap/jquery-jvectormap.css') !!}
    {!! Html::style('lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
    {!! Html::style('lte/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}
    {!! Html::style('lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
    {!! Html::style('css/jquery-confirm.min.css') !!}
    <style>
    </style>
    @yield('styles')

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    {!! Html::script('lte/bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::script('lte/bower_components/jquery-ui/jquery-ui.min.js') !!}
    {!! Html::script('lte/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    <!-- Sparkline -->
    {!! Html::script('lte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
    <!-- jvectormap -->
    {!! Html::script('lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
    {!! Html::script('lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
    <!-- jQuery Knob Chart -->
    {!! Html::script('lte/bower_components/jquery-knob/dist/jquery.knob.min.js') !!}
    <!-- daterangepicker -->
    {!! Html::script('lte/bower_components/moment/min/moment.min.js') !!}
    {!! Html::script('lte/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
    <!-- datepicker -->
    {!! Html::script('lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
    <!-- Bootstrap WYSIHTML5 -->
    {!! Html::script('lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
    <!-- Slimscroll -->
    {!! Html::script('lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
    <!-- FastClick -->
    {!! Html::script('lte/bower_components/fastclick/lib/fastclick.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('lte/dist/js/adminlte.min.js') !!}
    <!-- AdminLTE for demo purposes -->
    {!! Html::script('lte/dist/js/demo.js') !!}
    {!! Html::script('js/jquery-confirm.min.js') !!}
    @yield('scripts')
</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini" background="{{ asset('img/bg/login-bg.jpg') }}">
    <div class="wrapper">
        @include('template.header')
        @include('template.sidebar')
        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>
        @include('template.footer')
    </div>
</body>

</html>
