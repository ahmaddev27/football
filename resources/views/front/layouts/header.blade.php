<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">

                    @auth



                        <a onclick="event.preventDefault();
      document.getElementById('logout-form').submit();"  class="left-topbar-item m-3">
                            <span class="fa fa-power-off"></span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </a>

                        <a href="{{route('profile')}}" class="left-topbar-item m-3">
                            <span class="fa fa-user"></span>
                        </a>

                        <a href="{{route('article')}}" class="left-topbar-item m-3">
                            كتابة مقال
                        </a>

                    @else

                        <a href="{{route('login')}}" class="left-topbar-item m-3">
                            <span class="fa fa-user"></span>
                        </a>
                    @endauth


                    <a href="{{route('contact')}}" class="left-topbar-item m-3">
                        تواصل معنا
                    </a>

                    @foreach(pages() as $page)

                        <a href="{{route('pages',$page->id)}}" class="left-topbar-item m-3">

                            {{$page->title}}
                        </a>


                    @endforeach


                </div>

                <div class="right-topbar">
                    <a href="{{setting('facebook')}}">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="{{setting('twitter')}}">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-telegram"></span>
                    </a>

                    <a href="">
                        <span class="fab fa-instagram"></span>
                    </a>

                    <a href="">
                        <span class="fab fa-youtube"></span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile ">
                <a href="{{route('home')}}"><img src="{{asset(setting('image'))}}" alt="IMG-LOGO"></a>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze m-r--8">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>

        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="topbar-mobile">
                <li class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								New York, NY
							</span>


							<span>
								HI 58° LO 56°
							</span>
						</span>
                </li>

                <li class="left-topbar">
                    <a href="#" class="left-topbar-item">
                        About
                    </a>

                    <a href="#" class="left-topbar-item">
                        Contact
                    </a>

                    <a href="#" class="left-topbar-item">
                        Sing up
                    </a>

                    <a href="#" class="left-topbar-item">
                        Log in
                    </a>
                </li>

                <li class="right-topbar">
                    <a href="#">
                        <span class="fab fa-facebook-f"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-twitter"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-pinterest-p"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-vimeo-v"></span>
                    </a>

                    <a href="#">
                        <span class="fab fa-youtube"></span>
                    </a>
                </li>
            </ul>

            <ul class="main-menu-m">
                <li>
                    <a href="{{route('home')}}">الرئيسية</a>

                </li>

                <li>
                    <a href="{{route('matches')}}">مباريات</a>
                </li>

                <li>
                    <a href="#">اخبار </a>
                </li>


                <li>
                    <a href="{{route('galleries')}}">الصور </a>
                </li>

                <li>
                    <a href="{{route('videos')}}">الفيديوهات </a>
                </li>

            </ul>
        </div>

        <!--  -->
        <div class="wrap-logo no-banner container">
            <!-- Logo desktop -->
            <div class="logo">
                <a href="{{route('home')}}"><img src="{{asset(setting('image'))}}" width="500px" alt="LOGO"></a>
            </div>
        </div>

        <!--  -->
        <div class="wrap-main-nav">
            <div class="main-nav">
                <!-- Menu desktop -->
                <nav class="menu-desktop">
                    <a class="logo-stick" href="{{route('home')}}">
                        <img src="{{asset(setting('image'))}}" alt="LOGO">
                    </a>

                    <ul class="main-menu justify-content-center">
                        <li class="main-menu{{request()->routeIs('home') ? '-active' : '' }}">
                            <a href="{{route('home')}}">الرئيسية</a>
                        </li>

                        <li class="main-menu{{request()->routeIs('news') ? '-active' : '' }}">
                            <a href="{{route('search')}}">الاخبار</a>

                        </li>


                        <li class="main-menu-item">
                            <a href="{{route('galleries')}}">الصور</a>
                        </li>

                        <li class="main-menu-item">
                            <a href="{{route('videos')}}">الفيديوهات</a>

                        </li>

                        <li class="main-menu-item">
                            <a href="{{route('matches')}}">المباريات</a>
                        </li>





                        <li class="mega-menu-item">
                            <a href="#">البطولات </a>

                            <div class="sub-mega-menu">
                                <div class="nav flex-column nav-pills" role="tablist">
                                    <a class="nav-link active" data-toggle="pill" href="#enter-1" role="tab" aria-expanded="false">الدوريات</a>
                                    <a class="nav-link" data-toggle="pill" href="#enter-2" role="tab" aria-expanded="false">الكؤوس</a>
                                    <a class="nav-link " data-toggle="pill" href="#enter-3" role="tab" aria-expanded="true">الجميع</a>
                                </div>

                                <div class="tab-content">




                                    <div class="tab-pane active" id="enter-1" role="tabpanel" aria-expanded="false">
                                        <div class="row">
                                            @foreach(championship(null) as $i => $value)
                                               @if($value['type']==0)
                                                <div class="col-2">
                                                    <!-- Item post -->
                                                    <div>
                                                        <a href="{{route('standing',$i)}}" class="wrap-pic-w hov1 trans-03">
                                                            <img src="{{@$value['logo']}}" alt="IMG">
                                                        </a>

                                                        <div class="p-t-10">
                                                            <h5 class="p-b-5">
                                                                <a href="{{route('standing',$i)}}"
                                                                   class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                    {{$value['name']}}
                                                                </a>
                                                            </h5>

                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>



                                    <div class="tab-pane" id="enter-2" role="tabpanel" aria-expanded="false">
                                        <div class="row">
                                            @foreach(championship(null) as $i => $value)
                                                @if($value['type']==1)
                                                    <div class="col-2">
                                                        <!-- Item post -->
                                                        <div>
                                                            <a href="{{route('standing',$i)}}" class="wrap-pic-w hov1 trans-03">
                                                                <img src="{{@$value['logo']}}" alt="IMG">
                                                            </a>

                                                            <div class="p-t-10">
                                                                <h5 class="p-b-5">
                                                                    <a href="{{route('standing',$i)}}"
                                                                       class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                        {{$value['name']}}
                                                                    </a>
                                                                </h5>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="tab-pane " id="enter-3" role="tabpanel" aria-expanded="true">
                                        <div class="row">
                                            @foreach(championship(null) as $i => $value)

                                                    <div class="col-2">
                                                        <!-- Item post -->
                                                        <div>
                                                            <a href="{{route('standing',$i)}}" class="wrap-pic-w hov1 trans-03">
                                                                <img src="{{@$value['logo']}}" alt="IMG">
                                                            </a>

                                                            <div class="p-t-10">
                                                                <h5 class="p-b-5">
                                                                    <a href="{{route('standing',$i)}}"
                                                                       class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                        {{$value['name']}}
                                                                    </a>
                                                                </h5>

                                                            </div>
                                                        </div>
                                                    </div>

                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
