<nav class="admin-header header-dark navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset(\App\Models\Setting::where('key','image')->first()->value)}}" alt=""></a>

        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset(\App\Models\Setting::where('key','icon')->first()->value)}}" alt=""></a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>



    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link" ><i class="ti-fullscreen"></i></a>
        </li>
        <li class="nav-item dropdown hh">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-pill badge-warning" data-count="5" id="notif-count">05</span>
                <span class="badge badge-danger notification-status"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications" id="ahmed">

                <a href="#" class="dropdown-item">New registered user <small class="float-right text-muted time">Just now</small> </a>
                <a href="#" class="dropdown-item">New invoice received <small class="float-right text-muted time">22 mins</small> </a>
                <a href="#" class="dropdown-item">Server error report<small class="float-right text-muted time">7 hrs</small> </a>
                <a href="#" class="dropdown-item">Database report<small class="float-right text-muted time">1 days</small> </a>
                <a href="#" class="dropdown-item">Order confirmation<small class="float-right text-muted time">2 days</small> </a>
            </div>
        </li>



        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{asset(\App\Models\Setting::where('key','icon')->first()->value)}}" class="bg-light" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{auth()->user()->name}}</h5>
                            <span>{{auth()->user()->email}}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>البروفايل</a>

                <a class="dropdown-item" href="{{route('dashboard.admin.logout')}}"><i class="text-danger ti-unlock"></i>تسجيل الخروج</a>
            </div>
        </li>
    </ul>
</nav>
