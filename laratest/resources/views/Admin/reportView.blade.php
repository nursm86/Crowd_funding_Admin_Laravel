<html>
<head>
    <title>Report Page</title>
        <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <style>
            table{
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            table td, table thead{
                border: 1px solid #ddd;
                padding: 8px;
            }
            table tr:nth-child(even){
                background-color: aqua;
            }
            table thead{
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #4CAF50;
                color: #fff;
            }
        </style>
</head>
    <body>
        @if(session()->has('opt4'))
        <br>
            <h1 class="text-white bg-dark text-center">
                User's Count
            </h1>
            <table>
                <tbody>
                    <tr>
                        <td>Total Admin</td>
                        <td>:</td>
                        <td>{{$countsOf['admin']}}</td>
                    </tr>
                    <tr>
                        <td>Total Personal User</td>
                        <td>:</td>
                        <td>{{$countsOf['personal']}}</td>
                    </tr>
                    <tr>
                        <td>Total Organizational User</td>
                        <td>:</td>
                        <td>{{$countsOf['orgranization']}}</td>
                    </tr>
                    <tr>
                        <td>Total Volunteer</td>
                        <td>:</td>
                        <td>{{$countsOf['volunteer']}}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        @if(session()->has('opt1'))
        <br>
        <h1 class="text-white bg-dark text-center">
        Top 10 Donations of the Site
        </h1><br>
                <table>
                    <thead>
                        <tr>
                            <td>User Name</td>
                            <td>Campaing Title</td>
                            <td>Donation Amount</td>
                            <td>Donated Date</td>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($top10donations as $donation)
                                <tr>
                                    <td>{{$donation['username']}}</td>
                                    <td>{{$donation['title']}}</td>
                                    <td>{{$donation['amount']}}</td>
                                    <td>{{$donation['donationDate']}}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
        @endif

        @if(session()->has('opt2'))
        <br>
        <h1 class="text-white bg-dark text-center">
        Top 10 Donators of the Site
        </h1><br>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Total Donation Amount</td>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($top10donators as $donation)
                                <tr>
                                    <td>{{$donation['username']}}</td>
                                    <td>{{$donation['email']}}</td>
                                    <td>{{$donation['totalAmount']}}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
        @endif

        @if(session()->has('opt3'))
        <br>
        <h1 class="text-white bg-dark text-center">
        Donation's Over {{session('do')}}
        </h1><br>
                <table>
                    <thead>
                        <tr>
                            <td>User Name</td>
                            <td>Campaing Title</td>
                            <td>Donation Amount</td>
                            <td>Donated Date</td>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($donationsOver as $donation)
                                <tr>
                                    <td>{{$donation['username']}}</td>
                                    <td>{{$donation['title']}}</td>
                                    <td>{{$donation['amount']}}</td>
                                    <td>{{$donation['donationDate']}}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
        @endif
        <br>
    </body>
</html>