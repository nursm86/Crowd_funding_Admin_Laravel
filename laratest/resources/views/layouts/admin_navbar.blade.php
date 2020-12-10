
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