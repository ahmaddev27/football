@extends('front.layouts.index',['title'=>'الرئيسية'])
<!-- Post -->
@section('main')
    <!-- Feature post -->
    <section class="bg0 text-center">
        <div class="container">

            <div class="row bg13 mt-3 justify-content-center text-center">

                @foreach($data as $x)

                <div class="col-sm-12 p-r-25 col-lg-4 p-r-15-sr991">
                    <!-- Item latest -->
                    <div class="m-b-45 ">

                        <div class="p-t-16">

                            <h6  class="f1-s-10 cl2 hov-cl10 text-right">
                                <span class=" col-12 text-center {{status($x['status'])}} text-white">{{$x['status']}}</span>
                            </h6>

                                    <h6  class="f1-s-10 cl2 hov-cl10 trans-03">
                                    {{$x['team1']}}
                                     <img loading="lazy" style="width:50px" src="{{$x['img1']}}">
                                         {{ $x['team1_result'] }} : {{ $x['team2_result'] }}
                                    <img  loading="lazy" style="width:50px" src="{{$x['img2']}}">{{$x['team2']}}
                                </h6>


                        </div>
                    </div>
                </div>

                @endforeach


            </div>
            <a href="{{route('matches')}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03 float-left">
               جميع المبارايات
                <i class="fs-12 m-l-5 fa fa-caret-left"></i>
            </a>
            </div>


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
                                    اوروبي
                                </h3>


                                <a href="{{route('search')}}/?search={{(category('اوروبي'))}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    المزيد
                                    <i class="fs-12 m-l-5 fa fa-caret-left"></i>
                                </a>
                            </div>

                            <div class="row p-t-35">
                                <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                    <!-- Item post -->

                                    @php $p=posts('category_id',category('اوروبي'))->first() @endphp
                                    @if($p)
                                    <div class="m-b-30">
                                        <a href="{{route('post',$p->slug)}}" class="wrap-pic-w hov1 trans-03">
                                            <img  loading="lazy" src="{{asset($p->image)}}" alt="{{$p->title}}">
                                        </a>


                                        <div class="p-t-20">
                                            <h5 class="p-b-5">
                                                <a href="{{route('post',$p->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    {{str_limit($p->title,60)}}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">{{$p->created_at->format('H:i')}}</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$p->created_at->format('d M')}}</span>

                                        </span>
                                        </div>
                                    </div>
                                        @endif
                                </div>

                                <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                    <!-- Item post -->
                                    @foreach(posts('category_id',category('اوروبي'))->skip(1)->take(3) as $key=>$x)
                                        @if($p)
                                    <div class="flex-wr-sb-s m-b-30">
                                        <a href="{{route('post',$x->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img loading="lazy"  src="{{asset($x->image)}}"
                                                 alt="{{$x->title}}">
                                        </a>

                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="{{route('post',$x->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{str_limit($x->title,60)}}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">{{$x->created_at->format('H:i')}}</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$x->created_at->format('d M')}}</span>

                                        </span>
                                        </div>


                                    </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>


                        </div>

                        <!-- أسيوي -->
                        <div class="row">
                            <!-- أسيوي -->
                            <div class="col-sm-6 p-r-25 p-r-15-sr991 p-b-25">
                                <div class="how2 how2-cl7 flex-sb-c m-b-35">
                                    <h3 class="f1-m-2 cl19 tab01-title">
                                        أسيوي
                                    </h3>

                                    <a href="{{route('search')}}/?search={{(category('اسيوي'))}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        المزيد
                                        <i class="fs-12 m-l-5 fa fa-caret-left"></i>
                                    </a>
                                </div>


                            @php $p2=posts('category_id',category('اسيوي'))->first() @endphp
                                <!-- Main Item post -->
                                @if($p2)
                                <div class="m-b-30">
                                    <a href="{{route('post',$p2->slug)}}" class="wrap-pic-w hov1 trans-03">
                                        <img loading="lazy" src="{{asset($p2->image)}}" alt="{{$p2->image}}">
                                    </a>

                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a href="{{route('post',$p2->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                {{str_limit($p2->title,60)}} </a>
                                        </h5>

                                        <span class="cl8">
                                            <span class="f1-s-3">{{$p2->created_at->format('H:i')}}</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$p2->created_at->format('d M')}}</span>

                                        </span>
                                    </div>
                                </div>
                                @endif

                                @if($p2)
                                @foreach(posts('category_id',category('اسيوي'))->skip(1)->take(3) as $key=>$x)
                                    <div class="flex-wr-sb-s m-b-30">
                                        <a href="{{route('post',$x->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img  loading="lazy" src="{{asset($x->image)}}"
                                                 alt="{{$x->image}}">
                                        </a>

                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="{{route('post',$x->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{str_limit($x->title,60)}}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">{{$x->created_at->format('H:i')}}</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$x->created_at->format('d M')}}</span>

                                        </span>
                                        </div>


                                    </div>
                                @endforeach
                                @endif

                            </div>

                            <!--    لاتيني -->
                            <div class="col-sm-6 p-r-25 p-r-15-sr991 p-b-25">
                                <div class="how2 how2-cl2 flex-sb-c m-b-35">
                                    <h3 class="f1-m-2 cl13 tab01-title">
                                        لاتيني
                                    </h3>

                                    <a href="{{route('search')}}/?search={{(category('لاتيني'))}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                        المزيد
                                        <i class="fs-12 m-l-5 fa fa-caret-left"></i>
                                    </a>
                                </div>


                            @php $p3=posts('category_id',category('لاتيني'))->first() @endphp

                                @if($p3)
                            <!-- Main Item post -->
                                <div class="m-b-30">
                                    <a href="{{route('post',$p3->slug)}}" class="wrap-pic-w hov1 trans-03">
                                        <img  loading="lazy" src="{{asset($p3->image)}}" alt="{{$p3->title}}">
                                    </a>

                                    <div class="p-t-20">
                                        <h5 class="p-b-5">
                                            <a href="{{route('post',$p3->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                {{str_limit($p3->title,60)}} </a>
                                        </h5>



                                        <span class="cl8">
                                            <span class="f1-s-3">{{$p2->created_at->format('H:i')}}</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$p2->created_at->format('d M')}}</span>

                                        </span>
                                    </div>
                                </div>

                                    @endif
                                @if($p3)
                                @foreach(posts('category_id',category('لاتيني'))->skip(1)->take(3) as $key=>$x)
                                    <div class="flex-wr-sb-s m-b-30">
                                        <a href="{{route('post',$x->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                            <img loading="lazy" src="{{asset($x->image)}}"
                                                 alt="{{$x->title}}">
                                        </a>

                                        <div class="size-w-2">
                                            <h5 class="p-b-5">
                                                <a href="{{route('post',$x->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{str_limit($x->title,60)}}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">{{$x->created_at->format('H:i')}}</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$x->created_at->format('d M')}}</span>

                                        </span>
                                        </div>


                                    </div>
                                @endforeach

                                @endif
                            </div>

                        </div>





                        <div class="p-b-20">
                            <div class="how2 how2-cl3 flex-sb-c m-r-10 m-r-0-sr991">
                                <h3 class="f1-m-2 cl14 tab01-title">
                                    افريقي
                                </h3>


                                <a href="{{route('search')}}/?search={{(category('افريقي'))}}" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                    المزيد
                                    <i class="fs-12 m-l-5 fa fa-caret-left"></i>
                                </a>
                            </div>

                            <div class="row p-t-35">
                                <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                    <!-- Item post -->

                                    @php $p4=posts('category_id',category('افريقي'))->first() @endphp

                                    @if($p4)
                                    <div class="m-b-30">
                                        <a href="{{route('post',$p4->slug)}}" class="wrap-pic-w hov1 trans-03">
                                            <img loading="lazy"  src="{{asset($p4->image)}}" alt="{{$p4->title}}">
                                        </a>


                                        <div class="p-t-20">
                                            <h5 class="p-b-5">
                                                <a href="{{route('post',$p4->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    {{str_limit($p4->title,60)}}
                                                </a>
                                            </h5>

                                            <span class="cl8">
                                            <span class="f1-s-3">{{$p4->created_at->format('H:i')}}</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$p4->created_at->format('d M')}}</span>

                                        </span>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                @if($p4)
                                <div class="col-sm-6 p-r-25 p-r-15-sr991">
                                    <!-- Item post -->
                                    @foreach(posts('category_id',category('افريقي'))->skip(1)->take(3) as $key=>$x)
                                        <div class="flex-wr-sb-s m-b-30">
                                            <a href="{{route('post',$x->slug)}}" class="size-w-1 wrap-pic-w hov1 trans-03">
                                                <img  loading="lazy" src="{{asset($x->image)}}"
                                                     alt="{{$x->title}}">
                                            </a>

                                            <div class="size-w-2">
                                                <h5 class="p-b-5">
                                                    <a href="{{route('post',$x->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                        {{str_limit($x->title,60)}}
                                                    </a>
                                                </h5>

                                                <span class="cl8">
                                            <span class="f1-s-3">{{$x->created_at->format('H:i')}}</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$x->created_at->format('d M')}}</span>

                                        </span>
                                            </div>


                                        </div>
                                    @endforeach

                                </div>
                                @endif
                            </div>


                        </div>

                        <!-- Banner -->
                        <div class=" justify-content-center ">
                            <div class="flex-c-c">
                                <a href="#">
                                    <img  loading="lazy" class="max-w-full" src="{{asset(setting('banner_two'))}}" alt="IMG">
                                </a>
                            </div>
                        </div>





                    </div>
                </div>

                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <div class="flex-c-s p-t-8 p-b-65">
                            <a href="#">
                                <img  loading="lazy" class="max-w-full"  src="{{asset(setting('banner'))}} " alt="IMG">
                            </a>
                        </div>



                        <!-- Most Popular -->
                        <div class="p-b-30">
                            <div class="how2 how2-cl6 flex-s-c">
                                <h3 class="f1-m-2 cl18 tab01-title">
                                    الاكثر قراءة
                                </h3>
                            </div>

                            <ul class="p-t-35">
                          @foreach(posts('views',null)->take(6) as $post)
                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-45 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        <i class="fa fa-eye"></i>
                                    </div>

                                    <a href="{{route('post',$post->slug)}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        {{str_limit($post->title,50)}}
                                    </a>
                                </li>
                                @endforeach

                            </ul>
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

                                        @foreach(galleries(null,null) as $key=>$g)
                                            <div class="carousel-item {{$key==0?'active':''}} size-h-4">
                                                <img loading="lazy" class="d-block w-100 wrap-pic-w hov1 "  src="{{asset($g->images[0]->image)}}"
                                                    alt="First slide">

                                                <div class="p-tb-16 p-rl-25 bg3">
                                                    <h5 class="p-b-5">
                                                        <a href="{{route('gallery',$g->slug)}}" class="f1-m-3 cl0 hov-cl10 trans-03">
                                                            {{str_limit($g->description,80)}}
                                                        </a>
                                                    </h5>

                                                </div>
                                            </div>
                                        @endforeach


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

                        @foreach(articles(null)->take(10) as $article)
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="{{route('view.article',$article->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            {{$article->title}}
                                        </a>
                                    </h5>

                                    <span class="cl8">
										<a href="#" class="f1-s-4 cl14 hov-cl10 trans-03">
											{{$article->user->name}}
										</a>
                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$article->created_at->format('d M')}}</span>

									</span>
                                </div>
                            </div>
                        </div>

                        @endforeach
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
                            <a href="{{route('search')}}/?search=دوري أبطال أوروبا"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                ابطال اوروبا
                            </a>

                            {{--                                <a href="{{route('search')}}/?search=كأس العالم"--}}
                            {{--                                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">--}}
                            {{--                                    كأس العالم--}}
                            {{--                                </a>--}}

                            <a href="{{route('search')}}/?search=الدوري الإنجليزي"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                الانجليزي
                            </a>

                            <a href="{{route('search')}}/?search=الدوري الاسباني"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                الاسباني
                            </a>
                            <a href="{{route('search')}}/?search=الدوري الايطالي"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                الايطالي
                            </a>

                            <a href="{{route('search')}}/?search=الدوري الالماني"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                الالماني
                            </a>

                            <a href="{{route('search')}}/?search=الدوري الفرنسي"
                               class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                الفرنسي
                            </a>


                        </div>
                    </div>


                    <div class="p-l-10 p-rl-0-sr991  mt-5">

                        <!-- فيديو -->
                        <div class="how2 how2-cl21 flex-s-c">
                            <a href="{{route('videos')}}">
                            <h3 class="f1-m-2 cl21 tab01-title">
                                مكتبة الفيديوهات
                            </h3>
                            </a>
                        </div>
                        <div class="flex-wr-sb-s p-t-20 p-b-15 how-bor2">
                            <div class="flex-c-s">
                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">

                                        @foreach(videos(null,null) as $key=>$v)

                                        <div class="carousel-item {{$key==0?'active':''}}">
                                            <img loading="lazy" class="d-block w-100 wrap-pic-w hov1 "  src="{{asset($v->image)}}"
                                                 alt="First slide">

                                            <div class="p-tb-16 p-rl-25 bg3">
                                                <h5 class="p-b-5">
                                                    <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">

                                                        <button id="view" class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03"   data-toggle="modal" data-target="#modal-video-01" model_id="{{$v->id}}">
                                                            <span class="fab fa-youtube"></span><div></div>
                                                        </button>
                                                        {{str_limit($v->title,80)}}
                                                    </a>
                                                </h5>

                                            </div>
                                        </div>
                                        @endforeach


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




                </div>

            </div>
        </div>

    </section>



    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="video-mo-01">
                    <iframe id="link-video" src="" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>



@stop




@push('js')

    <script>
        $(document).on('click', '#view', function(){
            var id = $(this).attr("model_id");
            $.ajax({
                url:"{{route('video.ajax.data')}}",
                method:'get',
                data:{id:id},
                dataType:'json',
                success:function(data)
                {

                    $('#link-video').attr('src',data.link);


                }
            })
        });
    </script>
@endpush
