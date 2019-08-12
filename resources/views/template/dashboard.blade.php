<!DOCTYPE html>
    <html>
            <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>Sistem Penilaian SD</title>
                
                    <!-- Bootstrap 3.3.7 -->
                    {!! Html::style('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
                    {!! Html::style('adminlte/bower_components/font-awesome/css/font-awesome.min.css') !!}
                    {!! Html::style('adminlte/bower_components/Ionicons/css/ionicons.min.css') !!}
                    {!! Html::style('adminlte/dist/css/AdminLTE.min.css') !!}
                    {!! Html::style('adminlte/dist/css/skins/_all-skins.min.css') !!}
                    {!! Html::style('adminlte/bower_components/morris.js/morris.css') !!}
                    {!! Html::style('adminlte/bower_components/jvectormap/jquery-jvectormap.css') !!}
                    {!! Html::style('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
                    {!! Html::style('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}
                    {!! Html::style('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
                    @yield('styles')
                
                    <!-- Google Font -->
                    <link rel="stylesheet"
                        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
                
                    {!! Html::script('adminlte/bower_components/jquery/dist/jquery.min.js') !!}
                    {!! Html::script('adminlte/bower_components/jquery-ui/jquery-ui.min.js') !!}
                    {!! Html::script('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
                    <!-- Sparkline -->
                    {!! Html::script('adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
                    <!-- jvectormap -->
                    {!! Html::script('adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
                    {!! Html::script('adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
                    <!-- jQuery Knob Chart -->
                    {!! Html::script('adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') !!}
                    <!-- daterangepicker -->
                    {!! Html::script('adminlte/bower_components/moment/min/moment.min.js') !!}
                    {!! Html::script('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
                    <!-- datepicker -->
                    {!! Html::script('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
                    <!-- Bootstrap WYSIHTML5 -->
                    {!! Html::script('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
                    <!-- Slimscroll -->
                    {!! Html::script('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
                    <!-- FastClick -->
                    {!! Html::script('adminlte/bower_components/fastclick/lib/fastclick.js') !!}
                    <!-- AdminLTE App -->
                    {!! Html::script('adminlte/dist/js/adminlte.min.js') !!}
                    <!-- AdminLTE for demo purposes -->
                    {!! Html::script('adminlte/dist/js/demo.js') !!}
                    @yield('scripts')
                    <script>
                        $.widget.bridge('uibutton', $.ui.button);
                    </script>
                </head>
    <body class="hold-transition skin-blue layout-boxed">
        <div class="wrapper" >
            <!-- Header -->
            @include('header')
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <!-- Main content -->
                <section class="content">
                    <!-- Your Page Content Here -->
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <!-- Footer -->
            @include('footer')

        </div><!-- ./wrapper -->
    </body>
</html>