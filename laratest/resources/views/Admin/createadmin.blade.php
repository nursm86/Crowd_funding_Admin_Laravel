@extends('layouts.Admin_layout')
@section('title','Create New Admin')
@section('content')

<div class="patientprofile">
    <div class="d-flex justify-content-center align-items-center container ">
        <div class="col-md-8 donor">
            <h1 class="text-white bg-dark text-center">
                Create New Admin
            </h1>
			<div class="form-group">
					<span></span>
				</div>
        <form action="" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" id ="name" name="name" value="{{old('name')}}">
                <span id="err_name" style="color:red;">{{$errors->first('name')}}</span>
            </div>
            <div class="form-group">
                <label>UserName:</label>
                <input type="text" class="form-control" id="uname" name="username" value="{{old('username')}}">
                <span id="err_uname" style="color:red;">{{$errors->first('username')}}</span>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" id="password" name="pass" value="{{old('pass')}}">
                <span id="err_pass" style="color:red;">{{$errors->first('pass')}}</span>
            </div>
            <div class="form-group">
                <label>ConfirmPassword:</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" value="{{old('cpassword')}}">
                <span id="err_cpass" style="color:red;">{{$errors->first('cpassword')}}</span>
            </div>
            <div class="form-group">
                <label>Contact:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
                <span id="err_contact" style="color:red;">{{$errors->first('phone')}}</span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                <span id="err_email" style="color:red;">{{$errors->first('email')}}</span>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="textarea" class="form-control" id="address" name="address" value="{{old('address')}}">
                <span id="err_address" style="color:red;">{{$errors->first('address')}}</span>
            </div>
            <div class="form-group">
                <label>Security Que:</label>
                <input type="text" class="form-control" id="sq" name="sq" placeholder = "Who is your best friend?" value="{{old('sq')}}">
                <span id="err_sq" style="color:red;">{{$errors->first('sq')}}</span>
            </div>

            <div class="form-group">
                <label>Image:</label>
                <input type="file" class="form-control" id="file" name="file">
                <h3 style="color:red;">{{session('errmsg')}}</h3>
                <span id="err_file" style="color:red;">{{$errors->first('file')}}</span> 
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="create" value="Create Admin">
            </div>
        </form>

        <script type="text/javascript" src = "/assets/js/admin.js"></script>

@endsection