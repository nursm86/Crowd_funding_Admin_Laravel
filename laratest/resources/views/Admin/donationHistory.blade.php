@extends('layouts.Admin_layout')
@section('title','Donation History')
@section('content')

<div class="donorlist">
    
    <h1 class="text-white bg-dark text-center">
    Donation's History
    </h1><br><br>
            <div class="row ">

            <table class="table" id="myTable" name= "table">
                <thead>
                    <tr>
                        <td>User Name</td>
                        <td>Campaing Title</td>
                        <td>Donation Amount</td>
                        <td>Donated Date</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id = "suggestion">
                    <div class="col-md-8">
                        @foreach($donations as $donation)
                            <tr>
                                <td>{{$donation['username']}}</td>
                                <td>{{$donation['title']}}</td>
                                <td>{{$donation['amount']}}</td>
                                <td>{{$donation['ud']}}</td>
                                <td>
                                    <a href="{{route('admin.campaignedit',$donation['cid'])}}" class="btn btn-warning" target = "new">View Campaign</a> | 
                                    @if($donation['type'] == 1)
                                        <a href="{{route('admin.personalUseredit', $donation['uid'])}}" class="btn btn-warning" target = "new">View User</a> 
                                    @elseif($donation['type'] == 2)
                                        <a href="{{route('admin.organizationalUseredit',$donation['uid'])}}" class="btn btn-warning" target = "new">View User</a>
                                    @elseif($donation['type'] == 3)
                                        <a href="{{route('admin.volunteeredit',$donation['uid'])}}" class="btn btn-warning" target = "new">View User</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
</div>

@endsection