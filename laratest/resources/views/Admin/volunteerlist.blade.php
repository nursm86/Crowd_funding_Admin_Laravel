@extends('layouts.Admin_layout')
@section('title','Volunteers List')
@section('content')

<div class="donorlist">
    
    <h1 class="text-white bg-dark text-center">
    volunteer's
    </h1><br>
    <input value="volunteer" id="tablename" hidden>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control" name="see" id="see">
                        <option value="0" selected>All</option>
                        <option value="3">InValid</option>
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
                        <td>Organization Name</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Contact No</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id = "suggestion">
                    <div class="col-md-8">
                        @foreach($volunteers as $volunteer)
                            <tr>
                                <td>{{$volunteer['username']}}</td>
                                <td>{{$volunteer['name']}}</td>
                                <td>{{$volunteer['email']}}</td>
                                <td>{{$volunteer['address']}}</td>
                                <td>{{$volunteer['phone']}}</td>
                                <td>
                                    @if($volunteer['status'] == 1)
                                        valid
                                    @elseif($volunteer['status'] == 0)
                                        InValid
                                    @else
                                        Blocked
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.volunteeredit',$volunteer['id'])}}" class="btn btn-warning">View</a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
</div>

<script type="text/javascript" src = "/assets/js/main.js"></script>

@endsection