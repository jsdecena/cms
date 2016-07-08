<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/AdminLTE.min.css')}}">
	<link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.3/css/skins/_all-skins.css')}}">
</head>
<body>
	
	<div class="login-box">
		<div class="login-logo">
			<a href="{{url('admin')}}"><b>JSD</b>Blog</a>
		</div><!-- /.login-logo -->
		<div class="login-box-body">
			@include('cms::messages')
			<p class="login-box-msg">Sign in to start your session</p>
			<form action="{{route('login')}}" method="post">
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<div class="form-group has-feedback">
					<input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}" />
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
			
				<div class="form-group has-feedback">
					<input type="password" name="password" class="form-control" placeholder="Password" />
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div><!-- /.col -->
				</div>
			</form>
		</div><!-- /.login-box-body -->
	</div><!-- /.login-box -->
</body>
</html>