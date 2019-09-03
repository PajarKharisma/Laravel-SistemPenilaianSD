<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!! Html::style('loginres/vendor/bootstrap/css/bootstrap.min.css') !!}
	{!! Html::style('loginres/fonts/font-awesome-4.7.0/css/font-awesome.min.css') !!}
	{!! Html::style('loginres/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') !!}
	{!! Html::style('loginres/vendor/animate/animate.css') !!}
	{!! Html::style('loginres/vendor/css-hamburgers/hamburgers.min.css') !!}
	{!! Html::style('loginres/vendor/animsition/css/animsition.min.css') !!}
	{!! Html::style('loginres/vendor/select2/select2.min.css') !!}
	{!! Html::style('loginres/vendor/daterangepicker/daterangepicker.css') !!}
	{!! Html::style('loginres/css/util.css') !!}
	{!! Html::style('loginres/css/main.css') !!}
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<style>
		.center {
			position: absolute;
			top: 50%;
			left:50%;
			transform: translate(-50%,-50%);
		}
        body {
            background-color: lightblue;
        }
	</style>
</head>
<body>
	<div class="limiter">
		<div class="center">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-title p-b-33">
						Login Akun
					</span>

					<div class="wrap-input100 validate-input">
						<input id="username" type="username" class="input100 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="username">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input id="password" type="password" class="input100" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>