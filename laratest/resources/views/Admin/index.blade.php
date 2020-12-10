@extends('layouts.layout')
@section('title','Dashboard')
@section('content')

@extends('layouts.admin_navbar')
@extends('layouts.admin_sidebar')

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
                        <td>1</td>

                    </tr>

                    <tr>

                        <td class="tdattribute">Total Invalid Campaign </td>
                        <td>:</td>
                        <td>2 </td>

                    </tr>

                    <tr>
                        <td class="tdattribute">Total Blocked Campaign </td>
                        <td>:</td>
                        <td>3</td>

                    </tr>
                    <tr>
                        <td class="tdattribute">Total Complete Campaign</td>
                        <td>:</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Released Campaign</td>
                        <td>:</td>
                        <td>5</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Admin</td>
                        <td>:</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Personal User</td>
                        <td>:</td>
                        <td>7 </td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Organizational User</td>
                        <td>:</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td class="tdattribute">Total Volunteer</td>
                        <td>:</td>
                        <td>9</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>

@endsection