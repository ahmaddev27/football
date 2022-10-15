@extends('front.layouts.index',['title'=>'الأخبار'])
<!-- Post -->

@section('main')






    <section class="bg0 p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-20">

                    <div class="row p-t-35">

                        @foreach($posts as $post)
                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="{{route('post',$post->slug)}}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{asset($post->image)}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="{{route('post',$post->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            {{str_limit($post->title,60)}}
                                        </a>
                                    </h5>

                                    <span class="cl8">
                                            <span class="f1-s-3">{{$post->created_at->format('H:i')}}</span>

                                            <span class="f1-s-3 m-rl-3">-</span>

                                        <span href="#" class="f1-s-4 cl8 hov-cl10 trans-03">{{$post->created_at->format('d M')}}</span>

                                        </span>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>


                    <div class="text-center justify-content-center">
                        {{$posts->appends(request()->query())->links('vendor.pagination.simple-tailwind')}}

                    </div>
                </div>



                <div class="col-md-10 col-lg-4">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">




                            <!-- Tag -->
                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c m-b-30">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    تاجات
                                </h3>
                            </div>

                            <div class="flex-wr-s-s m-rl--5">
                                <a href="{{route('search')}}/?search=ابطال اوروبا"
                                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    ابطال اوروبا
                                </a>

                                {{--                                <a href="{{route('search')}}/?search=كأس العالم"--}}
                                {{--                                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">--}}
                                {{--                                    كأس العالم--}}
                                {{--                                </a>--}}

                                <a href="{{route('search')}}/?search=الدوري الانجليزي"
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
                                                        <img class="d-block w-100 wrap-pic-w hov1 trans-03"  src="{{asset($v->image)}}"
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

                            <div class="p-l-10 p-rl-0-sr991  mt-5">

                                <div class="p-l-10 p-rl-0-sr991">
                                    <!-- Banner -->
                                    <div class="flex-c-s">
                                        <a href="#">
                                            <img class="max-w-full" src="{{asset(setting('banner_three'))}} " alt="IMG">
                                        </a>
                                    </div>
                                </div>


                            </div>

                        </div>

                        <!-- Most Popular -->
                        <div class="p-b-30">
                            <div class="how2 how2-cl6 flex-s-c">
                                <h3 class="f1-m-2 cl18 tab01-title">
                                    الاكثر قراءة
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach(posts(null,null)->take(6) as $post)
                                    <li class="flex-wr-sb-s p-b-22">
                                        <div class="size-a-8 flex-c-c borad-45 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                            <i class="fa fa-eye"></i></div>
                                        <a href="{{route('post',$post->slug)}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                            {{str_limit($post->title,50)}}
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
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
