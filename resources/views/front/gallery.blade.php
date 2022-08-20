@extends('front.index',['title'=>$gallery->description])
<!-- Post -->

@section('main')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <style>
        div#social-links {
            margin: 0 auto;
            max-width: 500px;
        }
        div#social-links ul li {
            display: inline-block;
        }
        div#social-links ul li a {
            padding: 20px;
            border: 1px solid #ccc;
            margin: 1px;
            font-size: 30px;
            color: #222;
            background-color: #ccc;
        }
    </style>

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



                    <!-- Share -->
                    <div class="flex-s-s p-t-70">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
                                     مشاركة  :
								</span>

                        <div class="flex-wr-s-s size-w-0">
                            <a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                <i class="fab fa-facebook-f m-r-7"></i>
                                Facebook
                            </a>

                            <a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                <i class="fab fa-twitter m-r-7"></i>
                                Twitter
                            </a>

                            <a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                <i class="fab fa-google-plus-g m-r-7"></i>
                                Google+
                            </a>

                            <a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                <i class="fab fa-pinterest-p m-r-7"></i>
                                Pinterest
                            </a>
                        </div>
                    </div>


                </div>


                <!-- Sidebar -->



                <div class="col-md-10 col-lg-4 p-b-30">
                    <div class="p-l-10 p-rl-0-sr991 p-t-70">
                        <!-- Category -->
                        <div class="p-b-60">
                            <a href="#">
                                <img class="max-w-full"  src="{{asset(setting('banner'))}} " alt="IMG">
                            </a>
                        </div>


                        <!-- Popular Posts -->
                        <div class="p-b-30">
                            <div class="how2 how2-cl5 flex-s-c">
                                <h3 class="f1-m-2 cl17 tab01-title">
                                   أخر الصور
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach(galleries()->take(4) as $x)
                                <li class="flex-wr-sb-s p-b-30">
                                    <a href="{{route('gallery',$x->slug)}}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset($x->images[0]->image)}}" alt="IMG">
                                    </a>

                                    <div class="size-w-11">
                                        <h6 class="p-b-4">
                                            <a href="{{route('gallery',$x->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {{str_limit($x->description,50)}}
                                            </a>
                                        </h6>

                                        <span class="cl8 txt-center p-b-24">
                                            <span class="f1-s-3 " >{{$x->created_at->format('H:i')}}</span>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
                                                {{$x->created_at->diffforhumans()}}

											</span>
										</span>
                                    </div>
                                </li>
                                <li class="flex-wr-sb-s p-b-30">
                                    <a href="{{route('gallery',$x->slug)}}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset($x->images[0]->image)}}" alt="IMG">
                                    </a>

                                    <div class="size-w-11">
                                        <h6 class="p-b-4">
                                            <a href="{{route('gallery',$x->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {{str_limit($x->description,50)}}
                                            </a>
                                        </h6>

                                        <span class="cl8 txt-center p-b-24">
                                            <span class="f1-s-3 " >{{$x->created_at->format('H:i')}}</span>

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

                        <!-- Tag -->
                        <div>
                            <div class="how2 how2-cl4 flex-s-c m-b-30">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Tags
                                </h3>
                            </div>

                            <div class="flex-wr-s-s m-rl--5">
                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Fashion
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Lifestyle
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Denim
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Streetstyle
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Crafts
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Magazine
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    News
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Blogs
                                </a>
                            </div>
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
                <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">×</div>

                <div class="wrap-video-mo-01">
                    <div class="video-mo-01">
                        <iframe src="https://www.youtube.com/embed/wJnBTPUQS5A?rel=0" allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>
        </div>



    </section>

@stop







@push('js')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        // Customization example
        Fancybox.bind('[data-fancybox="gallery"]', {
            infinite: false
        });
    </script>



@endpush
