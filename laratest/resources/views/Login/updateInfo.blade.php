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
	<div
		class="fb-like"
		data-share="true"
		data-width="450"
		data-show-faces="true">
	</div>
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
				</ul>
			</div>
		</nav>
	</section>
	<div class="container">
		<br>
		<h1 class="text-black text-center">Update Info</h1>
		<center><h2 style="color: red;"></h2></center>
		<form name="myForm" action="" method="POST">
			{{ csrf_field() }}
			<div class="col-lg-8 m-auto d-block">
				<div class="form-group">
					<label for="phone">Contact Number:</label>
					<input type="text" name="phone" id="phone" class="form-control" value="{{old('phone')}}">
					<span id="err_user" style="color:red;">{{$errors->first('phone')}}</span>
				</div>

				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" name="address" id="address" class="form-control" value="{{old('address')}}">
					<span  id="err_pass" style="color:red;">{{$errors->first('address')}}</span>
				</div>

                <div class="form-group">
					<label for="sq">Sequrity Question</label>
					<input type="text" placeholder="Who is Your Best Friend" name="sq" id="sq" class="form-control" value="{{old('sq')}}">
					<span  id="err_pass" style="color:red;">{{$errors->first('sq')}}</span>
                </div>

				<div class="form-group">
					
				</div>
					<input type="submit" name="updateInfo" value="Update Info" class="btn btn-success">
				<br>
				<br>
			</div>
		</form>
	</div>
</body>

</html>

<script>
	function get(id){
		return document.getElementById(id);
	}
	function validateForm(){
		var user = get("user").value;
        var pass = get("pass").value;
		var err_user = get("err_user");
		var err_pass = get("err_pass");
		var has_error = true;
		if(user ==""){
			err_user.innerHTML ="User Name required";
			has_error = false;
		}
		if(pass ==""){
			err_pass.innerHTML ="Password required";
			has_error = false;
		}
		return has_error;
	}
</script>