@extends('layouts.Admin_layout')
@section('title','Released Campaigns')
@section('content')

<div class="donorlist">
    
    <h1 class="text-white bg-dark text-center">
    Released Campaings
    </h1>

            <div class="row ">

            <table class="table" id="myTable" name= "table">
                <thead>
                    <tr>
                        <td>User Name</td>
                        <td>Users Email</td>
                        <td>Campaing Title</td>
                        <td>Requested Fund</td>
                        <td>Raised Fund</td>
                        <td>Published Date</td>
                        <td>End Date</td>
                        <td>Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id = "suggestion">
                    <div class="col-md-8">
                        @foreach($campaigns as $campaign)
                            <tr>
                                <td>{{$campaign['username']}}</td>
                                <td>{{$campaign['email']}}</td>
                                <td>{{$campaign['title']}}</td>
                                <td>{{$campaign['tf']}}</td>
                                <td>{{$campaign['rf']}}</td>
                                <td>{{$campaign['pd']}}</td>
                                <td>{{$campaign['ed']}}</td>
                                <td>
                                    Released
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
</div>

@endsection