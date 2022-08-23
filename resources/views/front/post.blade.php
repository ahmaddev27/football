@extends('front.layouts.index',['title'=>$post->title])
<!-- Post -->

@section('main')



    <section class="bg0 p-b-140 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">

                            <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                                {{$post->title}}
                            </h3>

                            <div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										 <span >{{$post->created_at->format('H:i')}}</span>

									</a>

									<span class="m-rl-3">-</span>

									<span>
										{{$post->created_at->diffforhumans()}}
									</span>


                                    <span class="m-rl-3">-</span>
                                <span class="f1-s-3 cl8 m-r-15">
                                    مشاهدات : {{$post->views}}
								</span>

								</span>


                            </div>

                            <div class="wrap-pic-max-w p-b-30">
                                <img src="{{asset($post->image)}}" alt="IMG">
                            </div>

                            <p class="f1-s-11 cl6 p-b-25">
                                {!! $post->details !!}
                            </p>



                            <!-- Tag -->
                            <div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
								تاجات :
								</span>

                                @php  $tags=explode(",",$post->tags);@endphp

                                <div class="flex-wr-s-s size-w-0">
                                    @foreach($tags as $tag)
                                    <a href="#" class="f1-s-12 cl8 hov-link1 m-r-12">
                                        {{$tag}}
                                        @endforeach
                                    </a>

                                </div>
                            </div>

                            <!-- Share -->
                            <div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
                                    مشاركة :
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

                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-10 col-lg-4 p-b-30">
                    <div class="p-l-10 p-rl-0-sr991 p-t-70">
                        <!-- Category -->
                        <div class="p-b-60">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    التصنيفات
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                <li class="how-bor3 p-rl-4">
                                    <a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                                        اوروبي
                                    </a>
                                </li>

                                <li class="how-bor3 p-rl-4">
                                    <a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                                        عالمي
                                    </a>
                                </li>

                                <li class="how-bor3 p-rl-4">
                                    <a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                                        عربي
                                    </a>
                                </li>

                                <li class="how-bor3 p-rl-4">
                                    <a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                                       اسيوي
                                    </a>
                                </li>

                            </ul>
                        </div>



                        <!-- Popular Posts -->
                        <div class="p-b-30">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    الأكثر مشاهدة
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach(posts(null,null)->take(3) as $x)
                                <li class="flex-wr-sb-s p-b-30">
                                    <a href="{{route('post',$x->slug)}}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                        <img src="{{asset($x->image)}}" alt="IMG">
                                    </a>

                                    <div class="size-w-11">
                                        <h6 class="p-b-4">
                                            <a href="{{route('post',$x->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">
                                                {{str_limit($x->title,50)}}
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


@stop







@push('js')




@endpush
