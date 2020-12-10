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