<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        
        <link href="/css/style.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet">
        <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/myhomestyle.css" type="text/css">

        <title>@yield('title')</title>
        <link rel="shortcut icon" type="image/png" href="/system_images/mlogo.png">
    </head>
    <body>

        
<nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
    <i class="fas fa-lg fa-bars"></i>
    </button>
    <a class="navbar-brand" href="{{route('home.index')}}">
    <img src="/system_images/mlogo.png" id="logo" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" id="link" href="{{route('home.index')}}">
                    <i class="fa fa-home"></i></i>
                    Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" id="link" href="{{route('logout.index')}}">
                    <i class="fas fa-sign-out-alt"></i>
                    LogOut</a>
            </li>
        </ul>
    </div>
</nav>

<div class="wrapper">
    <nav id="sidebar">

    <ul class="list-unstyled components">
            <li>
                    <a href="{{route('admin.index')}}"><i class="fa fa-tachometer"></i>Dashboard</a>
            </li>
            
            <li>
                    <a href="{{route('admin.profile')}}"><i class="fa fa-user"></i><span>Profile</span></a>
            </li>

            <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-users"></i><span>Users</span></a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li>
                                    <a href="{{route('admin.adminlist')}}"><i class="fa fa-users"></i><span> Admins</span></a>
                            </li>
                            <li>
                                    <a href="{{route('admin.personaluserlist')}}"><i class="fa fa-users"></i><span> Personal usres</span></a>
                            </li>

                            <li>
                                    <a href="{{route('admin.organizationalList')}}"><i class="fa fa-plus-circle"></i><span>Organizations</span></a>
                            </li>

                            <li>
                                    <a href="{{route('admin.volunteerlist')}}"><i class="fa fa-user"></i><span>Volunteer</span></a>
                            </li>
                    </ul>
            </li>
            
            <li>
                    <a href="{{route('admin.create')}}"><i class="fa fa-plus"></i><span>Create New Admin</span></a>
            </li> 
            
            <li>
                    <a href="{{route('admin.donationlist')}}"><i class="fa fa-user"></i><span>Donations</span></a>
            </li>


            <li class="">
                    <a href="#homeSubmen" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fa fa-hand-peace-o"></i><span>Campaigns</span></a>
                    <ul class="collapse list-unstyled" id="homeSubmen">
                            <li>
                                    <a href="{{route('admin.releasedcampaign')}}"><i class="fa fa-history"></i>Released Campaings</a>
                            </li>
            
                            <li>
                                    <a href="{{route('admin.campaignslist')}}"><i class="fa fa-list-alt"></i>Runngin Campaings</a>
                            </li>
                    </ul>
            </li>

            <li>
                    <a href="{{route('admin.reports')}}"><i class="fa fa-phone"></i>Reports</a>
            </li>
            <li>
                    <a href="{{route('admin.usersproblems')}}"><i class="fa fa-phone"></i>Users Problem</a>
            </li>
         
             </ul>                 
    </nav>
    <div class="content">

        @yield('content')
    </div>
</div>

        <script src="/js/icons.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
        <script src="/js/script.js" ></script>
        <link rel="stylesheet" type="text/css" href="/css/jquery-clockpicker.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="/js/jquery-clockpicker.min.js"></script>
    </body>
</html>