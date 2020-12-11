@extends('layouts.Admin_layout')
@section('title','Campaigns Information')
@section('content')

<div class="patientprofile">
    <div class="row">
        <div class="col-md-4 box">
            <div class="well">
                <img src="{{$image}}" class="doc-img" width="300" height="300">
                <p></p>
            </div>
        </div>

        <div class="col-md-8 box">
            <h1 class="text-white bg-dark text-center">
                {{$title}}
            </h1>
            <table class="table">

                <tbody>
                    <tr>
                        <td class="tdattribute">User Name</td>
                        <td>:</td>
                        <td>{{$username}}</td>
                    </tr>

                    <tr>
                        <td class="tdattribute">Email</td>
                        <td>:</td>
                        <td>{{$email}} </td>
                    </tr>

                    <tr>

                        <td class="tdattribute">Requested Fund</td>
                        <td>:</td>
                        <td>{{$tf}} </td>

                    </tr>
                    <tr>
                        <td class="tdattribute">Raised Fund</td>
                        <td>:</td>
                        <td>{{$rf}} </td>

                    </tr>
                    <tr>
                        <td class="tdattribute">Publised Date</td>
                        <td>:</td>
                        <td>{{$pd}} </td>

                    </tr>
                    <tr>
                        <td class="tdattribute">End Date</td>
                        <td>:</td>
                        <td>{{$ed}} </td>

                    </tr>
                    <tr>
                        <td class="tdattribute">Description</td>
                        <td>:</td>
                        <td>{{$description}} </td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Status</td>
                        <td>:</td>
                        <td>
                            
                            @if($status == 1)
                                valid
                            @elseif($status == 0)
                                InValid
                            @elseif($status == 3)
                                Complete
                            @elseif($status == 4)
                                Released
                            @else
                                Blocked
                            @endif
                            
                        </td>

                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a href="{{route('admin.campaignslist')}}" class="btn btn-warning">Cancel</a>
                @if($status == 1)
                    <a href="{{route('admin.blockCampaign',$id)}}" class="btn btn-danger">Block Campaign</a>
                    <a href="{{route('admin.releaseCampaign',$id)}}" class="btn btn-success">Release Campaign</a>
                @elseif($status == 0)
                    <a href="{{route('admin.blockCampaign',$id)}}" class="btn btn-danger">Block Campaign</a>
                    <a href="{{route('admin.verifyCampaign',$id)}}" class="btn btn-success">Verify Campaign</a>
                @elseif($status == 2)
                    <a href="{{route('admin.unblockCampaign',$id)}}" class="btn btn-success">UnBlock Campaign</a>
                @endif
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal" @if($status == 4)
                        hidden
                    @endif><i class="fa fa-pencil-square-o"></i></button>
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
                    <form action="/admin/campaignedit/{{$id}} " method="POST">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{$title}} ">
                            <span style="color:red;"></span>
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="text" class="form-control" name="ed" value="{{$ed}}">
                            <span style="color:red;"></span>
                        </div>
                        <div class="form-group">
                            <label>Description:</label>
                            <input type="text" class="form-control" name="description" value="{{$description}} ">
                            <span style="color:red;"></span>
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