@extends('front.index',['title'=>'الرئيسية'])
<!-- Post -->
@section('main')
    <!-- Feature post -->
    <section class="bg0 text-center">
        <div class="container">

            <div class="row bg13 mt-3">

                @foreach($data as $x)

                <div class="col-sm-12 p-r-25 col-lg-4 p-r-15-sr991">
                    <!-- Item latest -->
                    <div class="m-b-45 ">

                        <div class="p-t-16">

                            <h6  class="f1-s-10 cl2 hov-cl10 text-right">
                                <span class="badge badge-{{status($x['status'])}}"> <b class="text-end" >{{$x['status']}}</b></span>
                            </h6>

                                    <h6  class="f1-s-10 cl2 hov-cl10 trans-03">
                                    {{$x['team1']}}
                                     <img style="width:50px" src="{{$x['img1']}}">
                                         {{ $x['team1_result'] }} : {{ $x['team2_result'] }}
                                    <img style="width:50px" src="{{$x['img2']}}">{{$x['team2']}}
                                </h6>


                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            </div>



{{--            --}}
{{--            <div class="row m-rl--1">--}}


{{--                <div class="col-sm-6 col-lg-4 p-rl-1 p-b-2">--}}
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            @foreach($data as $key=>$x)--}}
{{--                                <div class="col-sm col-lg-4">--}}

{{--                                        {{$x['team1']}}--}}


{{--                                        <img src="{{$x['img1']}}">--}}


{{--                                        {{$x['team2']}}--}}


{{--                                       <img src="{{$x['img2']}}">--}}


{{--                                </div>--}}
{{--                        </div>--}}



{{--                            @endforeach--}}


{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--      --}}
    </section>

    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="p-b-20">
                        <!-- اوروبي  -->
                        <div class="p-b-20">
                            <div class="how2 how2-cl1 flex-sb-c m-r-10 m-r-0-sr991">
                                <h3 class="f1-m-2 cl12 tab01-title">
                                    اوربي
                                </h3>


                                <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    المزيد
                                    <i class="fs-12 m-l-5 fa fa-caret-left"></i>
                                </a>
                            </div>

                            <div class="row p-t-35">
                                <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                    <!-- Item post -->
                                    <div class="m-b-30">
                                        <a href="#" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('front/images/post-05.jpg')}}" alt="IMG">
                                        </a>

                                        <div class="p-t-20">
                                            <h5 class="p-b-5">
                                                <a href="#" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    خبر اوربي حصري حديد من فوتبولر !!!
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                    <!-- Item post -->
                                    <div class="flex-wr-sb-s m-b-30">
                                        <a href="#" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('front/images/post-06.jpg')}}"
                                                 alt="IMGDonec metus orci, malesuada et lectus vitae">
                                        </a>

                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    خبراوربي جديد فرعي تاني
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                        </div>


                                    </div>
                                    <div class="flex-wr-sb-s m-b-30">
                                        <a href="#" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('front/images/post-07.jpg')}}"
                                                 alt="IMGDonec metus orci, malesuada et lectus vitae">
                                        </a>

                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    خبراوربي جديد فرعي تاني
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                        </div>


                                    </div>
                                    <div class="flex-wr-sb-s m-b-30">
                                        <a href="#" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('front/images/post-08.jpg')}}"
                                                 alt="IMGDonec metus orci, malesuada et lectus vitae">
                                        </a>

                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    خبراوربي جديد فرعي تاني
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                        </div>


                                    </div>

                                </div>
                            </div>


                        </div>

                        <!-- أسيوي -->
                        <div class="row">
                            <!-- عربي -->
                            <div class="col-sm-6 p-r-25 p-r-15-sr991 p-b-25">
                                <div class="how2 how2-cl2 flex-sb-c m-b-35">
                                    <h3 class="f1-m-2 cl13 tab01-title">
                                        أسيوي
                                    </h3>

                                    <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        المزيد
                                        <i class="fs-12 m-l-5 fa fa-caret-left"></i>
                                    </a>
                                </div>

                                <!-- Main Item post -->
                                <div class="m-b-30">
                                    <a href="#" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('front/images/post-10.jpg')}}" alt="IMG">
                                    </a>

                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                خبر عربي حصري حديد من فوتبولر !!! </a>
                                        </h5>

                                        <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                    </div>
                                </div>

                                <!-- Item post -->
                                <div class="flex-wr-sb-s m-b-30">
                                    <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('front/images/post-11.jpg')}}"
                                             alt="IMGDonec metus orci, malesuada et lectus vitae">
                                    </a>

                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                خبر عربي حصري حديد من فوتبولر
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                    </div>
                                </div>

                                <div class="flex-wr-sb-s m-b-30">
                                    <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('front/images/post-12.jpg')}}"
                                             alt="IMGDonec metus orci, malesuada et lectus vitae">
                                    </a>

                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                خبر عربي حصري حديد من فوتبولر
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                    </div>
                                </div>


                            </div>

                            <!--    لاتيني -->
                            <div class="col-sm-6 p-r-25 p-r-15-sr991 p-b-25">
                                <div class="how2 how2-cl7 flex-sb-c m-b-35">
                                    <h3 class="f1-m-2 cl19 tab01-title">
                                        لاتيني
                                    </h3>

                                    <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        المزيد
                                        <i class="fs-12 m-l-5 fa fa-caret-left"></i>
                                    </a>
                                </div>

                                <!-- Main Item post -->
                                <div class="m-b-30">
                                    <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('front/images/post-34.jpg')}}" alt="IMG">
                                    </a>

                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                خبر لاتيني حصري حديد من فوتبولر !!!
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                    </div>
                                </div>

                                <!-- Item post -->
                                <div class="flex-wr-sb-s m-b-30">
                                    <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('front/images/post-35.jpg')}}"
                                             alt="IMGDonec metus orci, malesuada et lectus vitae">
                                    </a>

                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                خبر لاتيني حصري حديد من فوتبولر
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                    </div>
                                </div>
                                <div class="flex-wr-sb-s m-b-30">
                                    <a href="blog-detail-01.html" class="size-w-1 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset('front/images/post-36.jpg')}}"
                                             alt="IMGDonec metus orci, malesuada et lectus vitae">
                                    </a>

                                    <div class="size-w-2">
                                        <h5 class="p-b-5">
                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                خبر افريقي حصري حديد من فوتبولر
                                            </a>
                                        </h5>

                                        <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <!-- افريقي  -->
                        <div class="p-b-25 p-r-10 p-r-0-sr991">
                            <div class="how2 how2-cl3 flex-sb-c m-r-10 m-r-0-sr991">
                                <h3 class="f1-m-2 cl14 tab01-title">
                                    افريقي
                                </h3>
                                <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    المزيد
                                    <i class="fs-12 m-l-5 fa fa-caret-left"></i>
                                </a>

                            </div>

                            <div class="flex-wr-sb-s p-t-35">
                                <div class="size-w-6 w-full-sr575">
                                    <!-- Item post -->
                                    <div class="m-b-30">
                                        <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('front/images/post-14.jpg')}}" alt="IMG">
                                        </a>

                                        <div class="p-t-25">
                                            <h5 class="p-b-5">
                                                <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    خبر افريقي حصري حديد من فوتبولر !!!
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">10:20</span>
                                            <span class="f1-s-3 m-rl-3">-</span>
                                            <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>
                                        </span>

                                            <p class="f1-s-1 cl6 p-t-18">

                                                خبر افريقي حصري حديد من فوتبولر !!!
                                                خبر افريقي حصري حديد من فوتبولر ...
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="size-w-7 w-full-sr575">
                                    <!-- Item post -->
                                    <div class="m-b-30">
                                        <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('front/images/post-15.jpg')}}" alt="IMG">
                                        </a>

                                        <div class="p-t-10">
                                            <h5 class="p-b-5">
                                                <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    خبر افريقي حصري حديد من فوتبولر !!!
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                        </div>
                                    </div>

                                    <!-- Item post -->
                                    <div class="m-b-30">
                                        <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('front/images/post-17.jpg')}}" alt="IMG">
                                        </a>

                                        <div class="p-t-10">
                                            <h5 class="p-b-5">
                                                <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    خبر افريقي حصري حديد من فوتبولر !!!
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">10:20</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>

                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>


                        <!-- Banner -->
                        <div class="container m-b-15">
                            <div class="flex-c-c">
                                <a href="#">
                                    <img class="max-w-full" src="{{asset('front/images/banner-01.jpg')}}" alt="IMG">
                                </a>
                            </div>
                        </div>

                        {{--                    فيديو--}}
                        {{--                    <div class="p-b-20">--}}
                        {{--                        <div class="how2 how2-cl20 flex-sb-c m-r-10 m-r-0-sr991">--}}
                        {{--                            <h3 class="f1-m-2 cl20 tab01-title">--}}
                        {{--                                فيديو--}}
                        {{--                            </h3>--}}


                        {{--                            <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">--}}
                        {{--                                المزيد--}}
                        {{--                                <i class="fs-12 m-l-5 fa fa-caret-left"></i>--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="row p-t-35">--}}
                        {{--                            <div class="col-sm-6 p-r-25 p-r-15-sr991">--}}
                        {{--                                <!-- Item post -->--}}
                        {{--                                <div class="m-b-30">--}}
                        {{--                                    <div class="wrap-pic-w pos-relative">--}}
                        {{--                                        <img src="{{asset('front/images/video-01.jpg')}}" alt="IMG">--}}
                        {{--                                        <a href="#" class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03">--}}
                        {{--                                            <span class="fab fa-youtube"></span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </div>--}}

                        {{--                                    <div class="p-tb-16 p-rl-25 bg3">--}}
                        {{--                                        <h5 class="p-b-5">--}}
                        {{--                                            <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">--}}
                        {{--                                                برشلونة يكتسح بيتيس برباعية واصابة ديمبلي--}}
                        {{--                                            </a>--}}
                        {{--                                        </h5>--}}

                        {{--                                        <span class="cl15">--}}

                        {{--										<span class="f1-s-4">--}}
                        {{--											Feb 18--}}
                        {{--										</span>--}}
                        {{--									</span>--}}
                        {{--                                    </div>--}}

                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="col-sm-6 p-r-25 p-r-15-sr991">--}}
                        {{--                                <!-- Item post -->--}}
                        {{--                                <div class="flex-wr-sb-s m-b-30">--}}

                        {{--                                    <a href="#" class="size-w-1 wrap-pic-w hov1 trans-03">--}}
                        {{--                                        <img src="{{asset('front/images/post-06.jpg')}}"--}}
                        {{--                                             alt="IMGDonec metus orci, malesuada et lectus vitae">--}}


                        {{--                                    </a>--}}

                        {{--                                    <div class="size-w-2">--}}

                        {{--                                        <h5 class="p-b-5">--}}
                        {{--                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">--}}
                        {{--                                                خبراوربي جديد فرعي تاني--}}
                        {{--                                            </a>--}}
                        {{--                                        </h5>--}}

                        {{--                                        <span class="cl8">--}}
                        {{--                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>--}}
                        {{--                                        </span>--}}
                        {{--                                    </div>--}}


                        {{--                                </div>--}}
                        {{--                                <div class="flex-wr-sb-s m-b-30">--}}
                        {{--                                    <a href="#" class="size-w-1 wrap-pic-w hov1 trans-03">--}}
                        {{--                                        <img src="{{asset('front/images/post-06.jpg')}}"--}}
                        {{--                                             alt="IMGDonec metus orci, malesuada et lectus vitae">--}}
                        {{--                                    </a>--}}

                        {{--                                    <div class="size-w-2">--}}
                        {{--                                        <h5 class="p-b-5">--}}
                        {{--                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">--}}
                        {{--                                                خبراوربي جديد فرعي تاني--}}
                        {{--                                            </a>--}}
                        {{--                                        </h5>--}}

                        {{--                                        <span class="cl8">--}}

                        {{--                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>--}}

                        {{--                                        </span>--}}
                        {{--                                    </div>--}}


                        {{--                                </div>--}}
                        {{--                                <div class="flex-wr-sb-s m-b-30">--}}
                        {{--                                    <a href="#" class="size-w-1 wrap-pic-w hov1 trans-03">--}}
                        {{--                                        <img src="{{asset('front/images/post-06.jpg')}}"--}}
                        {{--                                             alt="IMGDonec metus orci, malesuada et lectus vitae">--}}
                        {{--                                    </a>--}}

                        {{--                                    <div class="size-w-2">--}}
                        {{--                                        <h5 class="p-b-5">--}}
                        {{--                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">--}}
                        {{--                                                خبراوربي جديد فرعي تاني--}}
                        {{--                                            </a>--}}
                        {{--                                        </h5>--}}

                        {{--                                        <span class="cl8">--}}

                        {{--                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>--}}

                        {{--                                        </span>--}}
                        {{--                                    </div>--}}


                        {{--                                </div>--}}


                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}




                        {{--                    صور--}}
                        {{--                    <div class="p-b-20">--}}
                        {{--                        <div class="how2 how2-cl21 flex-sb-c m-r-10 m-r-0-sr991">--}}
                        {{--                            <h3 class="f1-m-2 cl21 tab01-title">--}}
                        {{--                               صور--}}
                        {{--                            </h3>--}}


                        {{--                            <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">--}}
                        {{--                                المزيد--}}
                        {{--                                <i class="fs-12 m-l-5 fa fa-caret-left"></i>--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="row p-t-35">--}}
                        {{--                            <div class="col-sm-6 p-r-25 p-r-15-sr991">--}}
                        {{--                                <!-- Item post -->--}}
                        {{--                                <div class="m-b-30">--}}
                        {{--                                    <div class="wrap-pic-w pos-relative">--}}
                        {{--                                        <img src="{{asset('front/images/post-16.jpg')}}" alt="IMG">--}}
                        {{--                                        <button class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03" data-toggle="modal" data-target="#modal-video-01">--}}
                        {{--                                            <span class="fa fa-images"></span>--}}
                        {{--                                        </button>--}}
                        {{--                                    </div>--}}

                        {{--                                    <div class="p-tb-16 p-rl-25 bg3">--}}
                        {{--                                        <h5 class="p-b-5">--}}
                        {{--                                            <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">--}}
                        {{--                                                بالصور برشلونة يكتسح بيتيس برباعية واصابة ديمبلي--}}
                        {{--                                            </a>--}}
                        {{--                                        </h5>--}}

                        {{--                                        <span class="cl15">--}}

                        {{--										<span class="f1-s-4">--}}
                        {{--											Feb 18--}}
                        {{--										</span>--}}
                        {{--									</span>--}}
                        {{--                                    </div>--}}

                        {{--                                </div>--}}
                        {{--                            </div>--}}

                        {{--                            <div class="col-sm-6 p-r-25 p-r-15-sr991">--}}
                        {{--                                <!-- Item post -->--}}
                        {{--                                <div class="flex-wr-sb-s m-b-30">--}}
                        {{--                                    <a href="#" class="size-w-1 wrap-pic-w hov1 trans-03">--}}
                        {{--                                        <img src="{{asset('front/images/post-06.jpg')}}"--}}
                        {{--                                             alt="IMGDonec metus orci, malesuada et lectus vitae">--}}
                        {{--                                    </a>--}}

                        {{--                                    <div class="size-w-2">--}}
                        {{--                                        <h5 class="p-b-5">--}}
                        {{--                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">--}}
                        {{--                                                خبراوربي جديد فرعي تاني--}}
                        {{--                                            </a>--}}
                        {{--                                        </h5>--}}

                        {{--                                        <span class="cl8">--}}

                        {{--                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>--}}
                        {{--                                        </span>--}}
                        {{--                                    </div>--}}


                        {{--                                </div>--}}
                        {{--                                <div class="flex-wr-sb-s m-b-30">--}}
                        {{--                                    <a href="#" class="size-w-1 wrap-pic-w hov1 trans-03">--}}
                        {{--                                        <img src="{{asset('front/images/post-06.jpg')}}"--}}
                        {{--                                             alt="IMGDonec metus orci, malesuada et lectus vitae">--}}
                        {{--                                    </a>--}}

                        {{--                                    <div class="size-w-2">--}}
                        {{--                                        <h5 class="p-b-5">--}}
                        {{--                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">--}}
                        {{--                                                خبراوربي جديد فرعي تاني--}}
                        {{--                                            </a>--}}
                        {{--                                        </h5>--}}

                        {{--                                        <span class="cl8">--}}

                        {{--                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>--}}

                        {{--                                        </span>--}}
                        {{--                                    </div>--}}


                        {{--                                </div>--}}
                        {{--                                <div class="flex-wr-sb-s m-b-30">--}}
                        {{--                                    <a href="#" class="size-w-1 wrap-pic-w hov1 trans-03">--}}
                        {{--                                        <img src="{{asset('front/images/post-06.jpg')}}"--}}
                        {{--                                             alt="IMGDonec metus orci, malesuada et lectus vitae">--}}
                        {{--                                    </a>--}}

                        {{--                                    <div class="size-w-2">--}}
                        {{--                                        <h5 class="p-b-5">--}}
                        {{--                                            <a href="blog-detail-01.html" class="f1-s-5 cl3 hov-cl10 trans-03">--}}
                        {{--                                                خبراوربي جديد فرعي تاني--}}
                        {{--                                            </a>--}}
                        {{--                                        </h5>--}}

                        {{--                                        <span class="cl8">--}}

                        {{--                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">Feb 18</span>--}}

                        {{--                                        </span>--}}
                        {{--                                    </div>--}}


                        {{--                                </div>--}}


                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}


                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- سوشيال -->
                        <div class="p-b-35">
                            <div class="how2 how2-cl5 flex-s-c">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                    سوشيال ميديا
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#"
                                       class="size-a-8 flex-c-c borad-49 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                        <span class="fab fa-facebook-f"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											6879 متابع
										</span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            لايك
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#"
                                       class="size-a-8 flex-c-c borad-49 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                        <span class="fab fa-twitter"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											568 متابع
										</span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            متابعة
                                        </a>
                                    </div>
                                </li>

                                <li class="flex-wr-sb-c p-b-20">
                                    <a href="#"
                                       class="size-a-8 flex-c-c borad-49 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                        <span class="fab fa-youtube"></span>
                                    </a>

                                    <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											5039 مشترك
										</span>

                                        <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                            اشتراك
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Most Popular -->
                        <div class="p-b-30">
                            <div class="how2 how2-cl6 flex-s-c">
                                <h3 class="f1-m-2 cl18 tab01-title">
                                    الاكثر قراءة
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-45 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        <i class="fa fa-eye"></i>
                                    </div>

                                    <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        المنتخب المصري يستعد لمواجه الكاميرون
                                    </a>
                                </li>

                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-45 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        <i class="fa fa-eye"></i>
                                    </div>

                                    <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        المنتخب المصري يستعد لمواجه الكاميرون
                                    </a>
                                </li>

                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-45 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        <i class="fa fa-eye"></i>
                                    </div>

                                    <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        المنتخب المصري يستعد لمواجه الكاميرون
                                    </a>
                                </li>

                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-45 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        <i class="fa fa-eye"></i>
                                    </div>

                                    <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        المنتخب المصري يستعد لمواجه الكاميرون
                                    </a>
                                </li>

                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-49 size-a-8 bg9 f1-m-4 cl0">
                                        <i class="fa fa-eye"></i>
                                    </div>

                                    <a href="#" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        المنتخب المصري يستعد لمواجه الكاميرون
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <!--  -->
                        <div class="flex-c-s p-t-8 p-b-65">
                            <a href="#">
                                <img class="max-w-full" src="{{asset('front/images/banner-02.jpg')}}" alt="IMG">
                            </a>
                        </div>

                        <!-- مكتبة الصور -->
                        <div class="how2 how2-cl20 flex-s-c">
                            <h3 class="f1-m-2 cl20 tab01-title">
                                مكتبة الصور
                            </h3>
                        </div>
                        <div class="flex-wr-sb-s p-t-20 p-b-15 how-bor2">
                            <div class="flex-c-s">
                                <div id="carousel2" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{asset('front/images/post-11.jpg')}}"
                                                 alt="First slide">

                                            <div class="carousel-caption d-none d-lg-block">
                                                <h5 class="p-t-300 text-white">
                                                    <a href="blog-detail-01.html"
                                                       class=" p-t-12 text-white f1-m-1 cl2 hov-cl10 trans-03 respon2">
                                                        موسيماني في الأهلي..المبالغة فوق الجميع
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <img class="d-block w-100" src="{{asset('front/images/post-11.jpg')}}"
                                                 alt="First slide">

                                            <div class="carousel-caption d-none d-lg-block">
                                                <h5 class="p-t-300 text-white">
                                                    <a href="blog-detail-01.html"
                                                       class=" p-t-12 text-white f1-m-1 cl2 hov-cl10 trans-03 respon2">
                                                        موسيماني في الأهلي..المبالغة فوق الجميع
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <img class="d-block w-100" src="{{asset('front/images/post-11.jpg')}}"
                                                 alt="First slide">

                                            <div class="carousel-caption d-none d-lg-block">
                                                <h5 class="p-t-300 text-white">
                                                    <a href="blog-detail-01.html"
                                                       class=" p-t-12 text-white f1-m-1 cl2 hov-cl10 trans-03 respon2">
                                                        موسيماني في الأهلي..المبالغة فوق الجميع
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                    <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>

                                </div>
                            </div>
                        </div>


                        <!-- Subscribe -->
                        <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
                            <h5 class="f1-m-5 cl0 p-b-10">
                                اشتراك
                            </h5>

                            <p class="f1-s-1 cl0 p-b-25">
                                اشترك في النشرة البريدية للحصول على اشعارات الاخبار والاحداث المهمة
                            </p>

                            <form class="size-a-9 pos-relative">
                                <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email"
                                       placeholder="البريد">

                                <button class="size-a-10 flex-c-c ab-t-l fs-16 cl9 hov-cl10 trans-03">
                                    <i class="fa fa-arrow-left"></i>
                                </button>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg0 p-t-60 p-b-35">


        <!-- Modal Video 01-->
        <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document" data-dismiss="modal">
                <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

                <div class="wrap-video-mo-01">
                    <div class="video-mo-01">
                        <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row justify-content-center">

                {{--            المقالات--}}

                <div class="col-md-10 col-lg-8 p-b-20">
                    <div class="how2 how2-cl5 flex-sb-c m-r-10 m-r-0-sr991">
                        <h3 class="f1-m-2 cl17 tab01-title">
                            اخر المقالات
                        </h3>
                        <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                            المزيد
                            <i class="fs-12 m-l-5 fa fa-caret-left"></i>
                        </a>


                    </div>
                    <div class="row p-t-35">

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset('front/images/latest-02.jpg')}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            1 موسيماني في الأهلي..المبالغة فوق الجميع
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl14 hov-cl10 trans-03">
											ضياء نصار
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 09
										</span>
									</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset('front/images/latest-01.jpg')}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            موسيماني في الأهلي..المبالغة فوق الجميع
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl14 hov-cl10 trans-03">
											ضياء نصار
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 09
										</span>
									</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset('front/images/latest-03.jpg')}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            موسيماني في الأهلي..المبالغة فوق الجميع
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl14 hov-cl10 trans-03">
											ضياء نصار
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 09
										</span>
									</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset('front/images/latest-04.jpg')}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            موسيماني في الأهلي..المبالغة فوق الجميع
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl14 hov-cl10 trans-03">
											ضياء نصار
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 09
										</span>
									</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset('front/images/latest-05.jpg')}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            موسيماني في الأهلي..المبالغة فوق الجميع
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl14 hov-cl10 trans-03">
											ضياء نصار
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 09
										</span>
									</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset('front/images/latest-01.jpg')}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            موسيماني في الأهلي..المبالغة فوق الجميع
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl14 hov-cl10 trans-03">
											ضياء نصار
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 09
										</span>
									</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset('front/images/latest-01.jpg')}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            موسيماني في الأهلي..المبالغة فوق الجميع
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl14 hov-cl10 trans-03">
											ضياء نصار
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 09
										</span>
									</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="blog-detail-01.html" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset('front/images/latest-01.jpg')}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="blog-detail-01.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            موسيماني في الأهلي..المبالغة فوق الجميع
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl14 hov-cl10 trans-03">
											ضياء نصار
										</a>

										<span class="f1-s-3 m-rl-3">
											-
										</span>

										<span class="f1-s-3">
											Feb 09
										</span>
									</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-10 col-lg-4 p-b-50">

                    <!-- Tag -->
                    <div class="p-b-55">
                        <div class="how2 how2-cl4 flex-s-c m-b-30">
                            <h3 class="f1-m-2 cl3 tab01-title">
                                تاجات
                            </h3>
                        </div>

                        <div class="flex-wr-s-s m-rl--5">
                            <a href="#"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                ابطال اوروبا
                            </a>

                            <a href="#"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                كأس العالم
                            </a>

                            <a href="#"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                انجلترا
                            </a>

                            <a href="#"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                اسبانيا
                            </a>
                            <a href="#"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                ايطاليا
                            </a>

                            <a href="#"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                المانيا
                            </a>

                            <a href="#"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                فرنسا
                            </a>


                        </div>
                    </div>


                    <div class="p-l-10 p-rl-0-sr991  mt-5">

                        <!-- فيديو -->
                        <div class="how2 how2-cl21 flex-s-c">
                            <h3 class="f1-m-2 cl21 tab01-title">
                                مكتبة الفيديوهات
                            </h3>
                        </div>
                        <div class="flex-wr-sb-s p-t-20 p-b-15 how-bor2">
                            <div class="flex-c-s">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{asset('front/images/post-11.jpg')}}"
                                                 alt="First slide">

                                            <div class="carousel-caption d-none d-lg-block">
                                                <h5 class="p-t-300 text-white">
                                                    <a href="blog-detail-01.html"
                                                       class=" p-t-12 text-white f1-m-1 cl2 hov-cl10 trans-03 respon2">
                                                        موسيماني في الأهلي..المبالغة فوق الجميع
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <img class="d-block w-100" src="{{asset('front/images/post-11.jpg')}}"
                                                 alt="First slide">

                                            <div class="carousel-caption d-none d-lg-block">
                                                <h5 class="p-t-300 text-white">
                                                    <a href="blog-detail-01.html"
                                                       class=" p-t-12 text-white f1-m-1 cl2 hov-cl10 trans-03 respon2">
                                                        موسيماني في الأهلي..المبالغة فوق الجميع
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="carousel-item ">
                                            <img class="d-block w-100" src="{{asset('front/images/post-11.jpg')}}"
                                                 alt="First slide">

                                            <div class="carousel-caption d-none d-lg-block">
                                                <h5 class="p-t-300 text-white">
                                                    <a href="blog-detail-01.html"
                                                       class=" p-t-12 text-white f1-m-1 cl2 hov-cl10 trans-03 respon2">
                                                        موسيماني في الأهلي..المبالغة فوق الجميع
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                       data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-l-10 p-rl-0-sr991  mt-5">

                        <div class="p-l-10 p-rl-0-sr991">
                            <!-- Banner -->
                            <div class="flex-c-s">
                                <a href="#">
                                    <img class="max-w-full" src="{{asset('front/images/banner-03.jpg')}}" alt="IMG">
                                </a>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>

    </section>

@stop




@push('js')
    <script>
        $(document).ready(function () {
            var itemsMainDiv = ('.MultiCarousel');
            var itemsDiv = ('.MultiCarousel-inner');
            var itemWidth = "";

            $('.leftLst, .rightLst').click(function () {
                var condition = $(this).hasClass("leftLst");
                if (condition)
                    click(0, this);
                else
                    click(1, this)
            });

            ResCarouselSize();


            $(window).resize(function () {
                ResCarouselSize();
            });

            //this function define the size of the items
            function ResCarouselSize() {
                var incno = 0;
                var dataItems = ("data-items");
                var itemClass = ('.item');
                var id = 0;
                var btnParentSb = '';
                var itemsSplit = '';
                var sampwidth = $(itemsMainDiv).width();
                var bodyWidth = $('body').width();
                $(itemsDiv).each(function () {
                    id = id + 1;
                    var itemNumbers = $(this).find(itemClass).length;
                    btnParentSb = $(this).parent().attr(dataItems);
                    itemsSplit = btnParentSb.split(',');
                    $(this).parent().attr("id", "MultiCarousel" + id);


                    if (bodyWidth >= 1200) {
                        incno = itemsSplit[3];
                        itemWidth = sampwidth / incno;
                    } else if (bodyWidth >= 992) {
                        incno = itemsSplit[2];
                        itemWidth = sampwidth / incno;
                    } else if (bodyWidth >= 768) {
                        incno = itemsSplit[1];
                        itemWidth = sampwidth / incno;
                    } else {
                        incno = itemsSplit[0];
                        itemWidth = sampwidth / incno;
                    }
                    $(this).css({'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers});
                    $(this).find(itemClass).each(function () {
                        $(this).outerWidth(itemWidth);
                    });

                    $(".leftLst").addClass("over");
                    $(".rightLst").removeClass("over");

                });
            }


            //this function used to move the items
            function ResCarousel(e, el, s) {
                var leftBtn = ('.leftLst');
                var rightBtn = ('.rightLst');
                var translateXval = '';
                var divStyle = $(el + ' ' + itemsDiv).css('transform');
                var values = divStyle.match(/-?[\d\.]+/g);
                var xds = Math.abs(values[4]);
                if (e == 0) {
                    translateXval = parseInt(xds) - parseInt(itemWidth * s);
                    $(el + ' ' + rightBtn).removeClass("over");

                    if (translateXval <= itemWidth / 2) {
                        translateXval = 0;
                        $(el + ' ' + leftBtn).addClass("over");
                    }
                } else if (e == 1) {
                    var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                    translateXval = parseInt(xds) + parseInt(itemWidth * s);
                    $(el + ' ' + leftBtn).removeClass("over");

                    if (translateXval >= itemsCondition - itemWidth / 2) {
                        translateXval = itemsCondition;
                        $(el + ' ' + rightBtn).addClass("over");
                    }
                }
                $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
            }

            //It is used to get some elements from btn
            function click(ell, ee) {
                var Parent = "#" + $(ee).parent().attr("id");
                var slide = $(Parent).attr("data-slide");
                ResCarousel(ell, Parent, slide);
            }

        });
    </script>
@endpush
