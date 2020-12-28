<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/indexstyle.css" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Login</title>
</head>


<body>
	<section id="nav-bar">
		<nav class="navbar navbar-expand-lg navbar-light ">
			<a class="navbar-brand" href="#"><img src="/system_images/mlogo.png"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto" align="right">
					<li class="nav-item active">
					<a class="nav-link" href="{{route('home.index')}}">Home </a>
					<a class="nav-link" href="{{route('login.index')}}">Back</a>
				</ul>
			</div>
		</nav>
	</section>
	<div class="container">
		<br>
        <h1 class="text-black text-center">Change Password</h1>

		<form name="myForm" action="" method="POST">
			{{ csrf_field() }}
			<div class="col-lg-8 m-auto d-block">
				<div class="form-group">
					<label for="user">Enter OTP from your Email:</label>
					<input type="text" name="otp" id="otp" class="form-control" value="{{old('otp')}}">
					<span id="err_email" style="color:red;">{{$errors->first('otp')}}</span>
                </div>
                <div class="form-group">
					<label for="user">Enter New Password :</label>
					<input type="password" name="npass" id="npass" class="form-control" value="{{old('npass')}}">
					<span id="err_email" style="color:red;">{{$errors->first('npass')}}</span>
                </div>
                <div class="form-group">
					<label for="user">Confirm New Password :</label>
					<input type="password" name="cpass" id="cpass" class="form-control" value="{{old('cpass')}}">
					<span id="err_email" style="color:red;">{{$errors->first('cpass')}}</span>
				</div>
				<input type="submit" name="verify" value="Change Password" class="btn btn-success">
				<br>
			</div>
		</form>
	</div>
</body>
</html>