@extends('front.layouts.index',['title'=>$gallery->description])
<!-- Post -->

@section('main')

    <link
        rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>

    <section class="bg0 p-b-140 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-20">

                            <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                                {{$gallery->description}}
                            </h3>

                            <p>

                                <span class="f1-s-3 cl8 m-r-15">
                                    <a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										 <span>{{$gallery->created_at->format('H:i')}}</span>
                                    </a>
                                    <span class="m-rl-3">-</span>
                                    <span>
										{{$gallery->created_at->diffforhumans()}}
                                    </span>

                                    <span class="m-rl-3">-</span>
                                    <span class="f1-s-3 cl8 m-r-15">مشاهدات : {{$gallery->views}}
                                    </span>
                                </span>
                            </p>

                        </div>

                            <div class="col-xl-12 pb-30">
                                    @if($gallery->images()->exists())
                                            <div class="row " id="gallery" data-toggle="modal" data-target="#exampleModal">
                                                @foreach($gallery->images as $key=>$image)

                                                    <div class="col-lg-{{$key==0?'12 size-h-5':'2'}} ">
                                                        <a data-fancybox="gallery" data-src="{{asset($image->image)}}">
                                                            <img class=" img-fluid w-100 shadow-1-strong rounded m-2" src="{{asset($image->image)}}" />
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                    @endif

                            </div>

                    </div>


                    <hr>
                    <h2 class="f1-l-4 cl5 p-b-16  respon2">المزيد من صور {{$gallery->championship}}</h2>


                    <div class="row p-t-35">
                        @foreach(galleries('championship',$gallery->championship) as $g)

                        <div class="col-sm-6 p-r-25 p-r-15-sr991">
                            <!-- Item latest -->
                            <div class="m-b-45">
                                <a href="{{route('gallery',$g->slug)}}" class="wrap-pic-w hov1 trans-03">
                                    <img src="{{$g->images[0]->image}}" alt="IMG">
                                </a>

                                <div class="p-t-16">
                                    <h5 class="p-b-5">
                                        <a href="{{route('gallery',$g->slug)}}" class="f1-m-3 cl2 hov-cl10 trans-03">
                                            {{$g->description}}
                                        </a>
                                    </h5>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>


                <!-- Sidebar -->



                <div class="col-md-10 col-lg-4 p-b-30">
                    <div class="p-l-10 p-rl-0-sr991 p-t-70">
                        <!-- Category -->
                        <div class="p-b-60">
                            <a href="#">
                                <img class="max-w-full" src="{{asset(setting('banner'))}} " alt="IMG">
                            </a>
                        </div>

                        <div class="p-b-30">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    الأكثر قراءة
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach(posts(null,null)->take(3) as $x)
                                    <li class="flex-wr-sb-s p-b-30">
                                        <a href="{{route('post',$x->slug)}}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset($x->image)}}" class="d-block w-100 wrap-pic-w hov1 trans-03" alt="IMG">
                                        </a>

                                        <div class="size-w-11">
                                            <h6 class="p-b-4">
                                                <a href="{{route('post',$x->slug)}}"
                                                   class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{str_limit($x->title,50)}}
                                                </a>
                                            </h6>

                                            <span class="cl8 txt-center p-b-24">
                                            <span class="f1-s-3 ">{{$x->created_at->format('H:i')}}</span>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
                                                {{$x->created_at->diffforhumans()}}

											</span>
										</span>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>


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

                    </div>
                </div>

                </div>
            </div>
    </section>



@stop







@push('js')



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js') }}"></script>




    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        // Customization example
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });
    </script>



@endpush
