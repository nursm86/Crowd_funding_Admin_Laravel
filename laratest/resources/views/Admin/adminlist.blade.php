@extends('layouts.Admin_layout')
@section('title','Admins List')
@section('content')

<div class="donorlist">
    
    <h1 class="text-white bg-dark text-center">
    Admin's
    </h1><br>

    @if(session()->has('print'))
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
                </tr>
            </thead>
            <tbody id = "suggestion">
                <div class="col-md-8">
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{$admin['username']}}</td>
                            <td>{{$admin['name']}}</td>
                            <td>{{$admin['email']}}</td>
                            <td>{{$admin['address']}}</td>
                            <td>{{$admin['phone']}}</td>
                            <td>Valid</td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
        </div>
</div>
    @else
        <div class="center">
            <h1 style="color:red">No Data Found!!!Maybe Remote Server isn't working</h1>
        </div>
    @endif

<script type="text/javascript" src = "/js/admin.js"></script>
@endsection