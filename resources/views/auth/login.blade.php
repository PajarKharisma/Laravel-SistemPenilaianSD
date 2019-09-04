<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Bootstrap 3.3.7 -->
    {!! Html::style('lte/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('lte/bower_components/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('lte/bower_components/Ionicons/css/ionicons.min.css') !!}
    {!! Html::style('lte/bower_components/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('lte/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('lte/dist/css/skins/_all-skins.min.css') !!}
    {!! Html::style('css/jquery-confirm.min.css') !!}
    {!! HTML::style('lte/plugins/iCheck/square/blue.css') !!}

    {!! Html::script('lte/bower_components/jquery/dist/jquery.min.js') !!}
    {!! Html::script('lte/bower_components/jquery-ui/jquery-ui.min.js') !!}
    {!! Html::script('lte/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
    {!! Html::script('lte/plugins/iCheck/icheck.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('lte/dist/js/adminlte.min.js') !!}
    <script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
    </script>
</head>
<body class="hold-transition" background="{{ asset('img/bg/login-bg.jpg') }}">
    <div class="login-box" style="border-radius: 15px; background-color : white !important;" >
        <div class="" style="padding-top:12px">    
            <img class="img-responsive center-block" src="{{url('/img/toplogin.png')}}" >    
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Masuk untuk memulai sesi</p>
            @include('errors.list')
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input name="username" id="username" type="text" class="form-control" placeholder="Masukan Nama Pengguna" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Masukan Kata Sandi" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Ingat saya
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                    </div>
                </div>
            </form>
        </div>
        <div> &nbsp;</div>
        <!-- /.login-box-body -->
    </div>
</body>
</html>