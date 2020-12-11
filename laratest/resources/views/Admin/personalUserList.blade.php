@extends('layouts.layout')
@section('title','Profile')
@section('content')

@extends('layouts.admin_sidebar')
@extends('layouts.admin_navbar')

<div class="donorlist">
    
    <h1 class="text-white bg-dark text-center">
    Personal users
    </h1><br>
    <input value="personal" id="tablename" hidden>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control" name="see" id="see">
                        <option value="0" selected>All</option>
                        <option value="1" >Valid</option>
                        <option value="2" >Blocked</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control" id="searchby">
                    <option value = "name" selected hidden>Searh By</option>
                        <option value="username" >User Name</option>
                        <option value="name" >Name</option>
                        <option value="email" >Email</option>
                        <option value="address" >Address</option>
                        <option value="phone" >contact no</option>
                </select>
            </div>
        </div>
        <div class="col-md-8 donor">
        <input type="text" name="search" id="search" placeholder="Search Personal Users">
        </div>
    </div><br>

            <div class="row ">

            <table class="table" id="myTable" name= "table">
                <thead>
                    <tr>
                        <td>User Name</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Contact No</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id = "suggestion">
                    <div class="col-md-8">
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user['username']}}</td>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>{{$user['address']}}</td>
                                <td>{{$user['phone']}}</td>
                                <td>
                                    @if($user['status'] == 1)
                                        valid
                                    @elseif($user['status'] == 2)
                                        Blocked
                                    @endif
                                </td>
                                <td>
                                <a href="{{route('admin.personalUseredit', $user['id'])}}" class="btn btn-warning">View</a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
</div>

<script type="text/javascript" src = "/js/main.js"></script>
@endsection