@extends('layouts.Admin_layout')
@section('title','Campaigns Information')
@section('content')

<div class="donorlist">
    
    <h1 class="text-white bg-dark text-center">
    Users Report's
    </h1><br><br>

            <div class="row ">

            <table class="table" id="myTable" name= "table">
                <thead>
                    <tr>
                        <td>User Name</td>
                        <td>Campaign Title</td>
                        <td>Report Description</td>
                        <td>Complain Date</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody id = "suggestion">
                    <div class="col-md-8">
                        @foreach($problems as $problem)
                            <tr>
                                <td>{{$problem['username']}}</td>
                                <td>{{$problem['title']}}</td>
                                <td>{{$problem['description']}}</td>
                                <td>{{$problem['ud']}}</td>
                                <td>
                                    <a href="{{route('admin.campaignedit',$problem['cid'])}}" class="btn btn-warning" target = "new">View Campaign</a> | 
                                    
                                    @if($problem['type'] == 1)
                                        <a href="{{route('admin.personalUseredit', $problem['uid'])}}" class="btn btn-warning" target = "new">View User</a> | 
                                    @elseif($problem['type'] == 2)
                                        <a href="{{route('admin.organizationalUseredit',$problem['uid'])}}" class="btn btn-warning" target = "new">View User</a> | 
                                    @elseif($problem['type'] == 3)
                                        <a href="{{route('admin.volunteeredit',$problem['uid'])}}" class="btn btn-warning" target = "new">View User</a> |
                                    @endif
                                    
                                    <a href="{{route('admin.deleteReport',$problem['rid'])}}" class="btn btn-danger">Delete Report</a>
                                </td>
                            
                            </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
</div>

@endsection