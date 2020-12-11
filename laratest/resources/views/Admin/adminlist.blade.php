@extends('layouts.layout')
@section('title','Profile')
@section('content')

@extends('layouts.admin_sidebar')
@extends('layouts.admin_navbar')

<div class="donorlist">
    
    <h1 class="text-white bg-dark text-center">
    Admin's
    </h1><br>

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

<script type="text/javascript" src = "/js/admin.js"></script>
@endsection