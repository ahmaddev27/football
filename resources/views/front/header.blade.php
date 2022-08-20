<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <div class="topbar">
            <div class="content-topbar container h-100">
                <div class="left-topbar">
						<span class="left-topbar-item flex-wr-s-c">
							<span>
								New York, NY
							</span>

							<img class="m-b-1 m-rl-8" src="{{asset('front/images/icons/icon-night.png')}}" alt="IMG">

							<span>
								HI 58° LO 56°
							</span>
						</span>

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
                </div>

                <div class="right-topbar">
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
                </div>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile ">
                <a href="index.html"><img src="{{asset(setting('image'))}}" alt="IMG-LOGO"></a>
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
                    <a class="logo-stick" href="index.html">
                        <img src="{{asset(setting('image'))}}" alt="LOGO">
                    </a>

                    <ul class="main-menu justify-content-center">
                        <li class="main-menu{{request()->routeIs('home') ? '-active' : '' }}">
                            <a href="{{route('home')}}">الرئيسية</a>
                        </li>

                        <li class="main-menu{{request()->routeIs('news') ? '-active' : '' }}">
                            <a href="category-01.html">الاخبار</a>

                        </li>

                        <li class="main-menu-item">
                            <a href="category-02.html">الانتقالات </a>

                        </li>

                        <li class="main-menu-item">
                            <a href="category-01.html">الصور</a>
                        </li>

                        <li class="main-menu-item">
                            <a href="category-02.html">الفيديوهات</a>

                        </li>

                        <li class="main-menu-item">
                            <a href="{{route('matches')}}">المباريات</a>
                        </li>


                        <li class="mega-menu-item">
                            <a href="category-01.html">البطولات</a>

                            <div class="sub-mega-menu">

                                <div class="tab-content">
                                    <div class="tab-pane show active" id="life-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-3">
                                                <!-- Item post -->
                                                <div>
                                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                        <img src="images/post-25.jpg" alt="IMG">
                                                    </a>

                                                    <div class="p-t-10">
                                                        <h5 class="p-b-5">
                                                            <a href="blog-detail-01.html"
                                                               class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                Donec metus orci, malesuada et lectus vitae
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
																<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Music
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																	Feb 18
																</span>
															</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <!-- Item post -->
                                                <div>
                                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                        <img src="images/post-27.jpg" alt="IMG">
                                                    </a>

                                                    <div class="p-t-10">
                                                        <h5 class="p-b-5">
                                                            <a href="blog-detail-01.html"
                                                               class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                Donec metus orci, malesuada et lectus vitae
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
																<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Music
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																	Jan 20
																</span>
															</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <!-- Item post -->
                                                <div>
                                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                        <img src="images/post-26.jpg" alt="IMG">
                                                    </a>

                                                    <div class="p-t-10">
                                                        <h5 class="p-b-5">
                                                            <a href="blog-detail-01.html"
                                                               class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                Donec metus orci, malesuada et lectus vitae
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
																<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Music
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																	Feb 12
																</span>
															</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <!-- Item post -->
                                                <div>
                                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                                        <img src="images/post-34.jpg" alt="IMG">
                                                    </a>

                                                    <div class="p-t-10">
                                                        <h5 class="p-b-5">
                                                            <a href="blog-detail-01.html"
                                                               class="f1-s-5 cl3 hov-cl10 trans-03">
                                                                Donec metus orci, malesuada et lectus vitae
                                                            </a>
                                                        </h5>

                                                        <span class="cl8">
																<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
																	Music
																</a>

																<span class="f1-s-3 m-rl-3">
																	-
																</span>

																<span class="f1-s-3">
																	Jan 15
																</span>
															</span>
                                                    </div>
                                                </div>
                                            </div>
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
