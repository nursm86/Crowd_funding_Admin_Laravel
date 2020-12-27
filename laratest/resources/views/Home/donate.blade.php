@extends('layouts.home_navbar')
@section('title','Donate')
@section('content')

<div class="patientprofile">
    <div class="row">
        <div class="col-md-4 box">
            <div class="well">
                <img src="https://uphatter.com/share.png" class="doc-img" width="300" height="300">
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
                        <td>{{$email}}</td>
                    </tr>

                    <tr>

                        <td class="tdattribute">Requested Fund</td>
                        <td>:</td>
                        <td>{{$tf}}</td>

                    </tr>
                    <tr>
                        <td class="tdattribute">Raised Fund</td>
                        <td>:</td>
                        <td name = "rf">{{$rf}}</td>

                    </tr>
                    <tr>
                        <td class="tdattribute">Publised Date</td>
                        <td>:</td>
                        <td>{{$pd}}</td>

                    </tr>
                    <tr>
                        <td class="tdattribute">End Date</td>
                        <td>:</td>
                        <td>{{$ed}}</td>

                    </tr>
                    <tr>
                        <td class="tdattribute">Description</td>
                        <td>:</td>
                        <td>{{$description}}</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Status</td>
                        <td>:</td>
                        <td>
                            Valid 
                        </td>

                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a href="/home" class="btn btn-warning">Back</a>
            </div>
            <div class="form-group">
                <form method="post">
                    {{ csrf_field() }}
                    <input type="number" name="amount" placeholder="Donation amount" min="1" value="{{old('amount')}}">
                    <input type="submit" name="submit" value="Donate" class="btn btn-success">
                    <span  id="err" style="color:red;">{{$errors->first('amount')}}</span>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
</div>

@endsection