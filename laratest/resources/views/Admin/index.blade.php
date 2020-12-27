@extends('layouts.Admin_layout')
@section('title','Dashboard')
@section('content')

<div class="col-md-8 donor">
    <a href="{{route('admin.generateReport')}}" class="btn btn-success">Generate Report</a>
</div>
        <div class="center col-md-8 box">
            <h1 class="text-white bg-dark text-center">
                Admin's Dashboard
            </h1>
            <table class="table">
                <tbody>
                    <tr>

                        <td class="tdattribute">Total Valid Campaign </td>
                        <td>:</td>
                        <td>{{$validCampaign}}</td>

                    </tr>

                    <tr>

                        <td class="tdattribute">Total Invalid Campaign </td>
                        <td>:</td>
                        <td>{{$inValidCampaign}}</td>

                    </tr>

                    <tr>
                        <td class="tdattribute">Total Blocked Campaign </td>
                        <td>:</td>
                        <td>{{$blockedValidCampaign}}</td>

                    </tr>
                    <tr>
                        <td class="tdattribute">Total Complete Campaign</td>
                        <td>:</td>
                        <td>{{$completeValidCampaign}}</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Released Campaign</td>
                        <td>:</td>
                        <td>{{$releasedValidCampaign}}</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Admin</td>
                        <td>:</td>
                        <td>{{$admin}}</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Personal User</td>
                        <td>:</td>
                        <td>{{$personal}}</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Organizational User</td>
                        <td>:</td>
                        <td>{{$orgranization}}</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Volunteer</td>
                        <td>:</td>
                        <td>{{$volunteer}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>

@endsection