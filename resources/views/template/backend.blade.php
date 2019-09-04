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
    {!! Html::style('lte/bower_components/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('lte/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('lte/dist/css/skins/_all-skins.min.css') !!}
    {!! Html::style('css/jquery-confirm.min.css') !!}
    @yield('styles')
    
    {!! Html::script('lte/bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::script('lte/bower_components/jquery-ui/jquery-ui.min.js') !!}
    {!! Html::script('lte/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('lte/dist/js/adminlte.min.js') !!}
    {!! Html::script('lte/plugins/iCheck/icheck.min.js') !!}
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
