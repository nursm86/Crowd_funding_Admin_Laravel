@extends('layouts.Admin_layout')
@section('title','Profile')
@section('content')

<div class="patientprofile">
    <div class="row">
        <div class="col-md-4 box">
            <div class="well">
                <img src="{{$image}}" class="doc-img">
                <h3 style="color:red;">{{session('errmsg')}}</h3>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editimage"><i class="fa fa-picture-o"></i></button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editpass"><i class="fa fa-key"></i></button>
                </div>
                <p></p>
            </div>
        </div>


        <div class="col-md-8 box">
            <h1 class="text-white bg-dark text-center">
                Personal Information
            </h1>
            <table class="table">
                <tbody>
                    <tr>

                        <td class="tdattribute">Name</td>
                        <td>:</td>
                        <td>{{$name}}</td>

                    </tr>

                    <tr>

                        <td class="tdattribute">Email</td>
                        <td>:</td>
                        <td>{{$email}} </td>

                    </tr>

                    <tr>

                        <td class="tdattribute">Phone Number</td>
                        <td>:</td>
                        <td>{{$phone}} </td>

                    </tr>
                    <tr>
                        <td class="tdattribute">Address</td>
                        <td>:</td>
                        <td>{{$address}} </td>

                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal"><i class="fa fa-pencil-square-o"></i></button>
        </div>
    </div>
    <!-- ---------------------------------------editimage------------------------------------------------- -->
    <div class="modal fadeInDown" id="editimage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.changepropic',$id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <!-- <img src="../images/placeholder.png" onclick="triggerClick()" id="profileDisplay"><br> -->
                            <label for="propic">Image</label>
                            <input type="file" name="propic" id="file" value="" class="form-control">

                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="imgUpdate" value="Update"></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- -----------------------------editpass--------------------------------------------------- -->
    <div class="modal fade" id="editpass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.changepass',$id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="pass">Current Password</label>
                            <input type="password" class="form-control" name="pass" value="{{old('pass')}}">
                            <span style="color:red;">{{$errors->first('pass')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="npass">New Password</label>
                            <input type="password" class="form-control" name="npass" value="{{old('npass')}}">
                            <span style="color:red">{{$errors->first('npass')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="cpass">Confirm Password</label>
                            <input type="password" class="form-control" name="cpass" value="{{old('cpass')}}">
                            <span style="color:red;">{{$errors->first('cpass')}}</span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="passUpdate">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Editmodal-------------------------------------------------------------------------------- -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.edit',$id)}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$name}}">
                            <span style="color:red;">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{$email}}">
                            <span style="color:red;">{{$errors->first('email')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Phone No:</label>
                            <input type="text" class="form-control" name="phone" value="{{$phone}}">
                            <span style="color:red;">{{$errors->first('phone')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" value="{{$address}}">
                            <span style="color:red;">{{$errors->first('address')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Security Que</label>
                            <input type="text" class="form-control" name="sq" value="{{$sq}}">
                            <span style="color:red;">{{$errors->first('sq')}}</span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="infoUpdate" value="Update">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
</div>

@endsection