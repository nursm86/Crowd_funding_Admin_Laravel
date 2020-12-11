@extends('layouts.Admin_layout')
@section('title',"Organization's Information")
@section('content')

<div class="d-flex justify-content-center align-items-center container ">
    <div class="col-md-8 box">
                <h1 class="text-white bg-dark text-center">
                    Organization's Information
                </h1>
                
                <form action="" method="post" class="center">
                    <div class="form-group">
                        <label>User Name: {{$username}}</label>
                    </div>
                    <div class="form-group">
                        <label>Organization Name: {{$name}}</label>
                    </div>
                    <div class="form-group">
                        <label>Email: {{$email}}</label>
                    </div>
                    <div class="form-group">
                        <label>Phone: {{$phone}}</label>
                    </div>
                    <div class="form-group">
                        <label>Address: {{$address}}</label>
                    </div>
                    <div class="form-group">
                        <label>Status: 
                            @if($status == 1)
                                valid
                            @elseif($status == 0)
                                InValid
                            @else
                                Blocked
                            @endif
                        </label>
                    </div>
                    <div class="form-group">
                        <a href="{{route('admin.organizationalList')}}" class="btn btn-warning">Cancel</a>
                        @if($status == 1)
                            <a href="{{route('admin.blockuser',$id)}}" class="btn btn-danger">Block User</a>
                        @elseif($status == 0)
                            <a href="{{route('admin.blockuser',$id)}}" class="btn btn-danger">Block User</a>
                            <a href="{{route('admin.verifyuser',$id)}}" class="btn btn-success">Verify User</a>
                        @else
                            <a href="{{route('admin.unblockuser',$id)}}" class="btn btn-success">UnBlock User</a>
                        @endif
                    </div>
                </form>
    </div>
</div>
@endsection