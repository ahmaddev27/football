@extends('front.layouts.index',['title'=>'مكتبة الصور'])
<!-- Post -->

@section('main')



    <section class="bg0 p-b-140 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">

                            <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2 ">
                                معرض الصور
                            </h3>

                            <div class="flex-wr-s-s p-b-40">

                                <div class="row justify-content-center">


                                    @foreach(galleries() as $g)

                                        <div class="col-md-6 col-sm mb-5">

                                            <div class="">
                                                <img class="d-block w-100" src="{{asset($g->images[0]->image)}}"
                                                     alt="First slide">

                                                <div class="p-tb-16 p-rl-25 bg3" style="min-height:150px">
                                                    <h5 class="p-b-5">
                                                        <a href="{{route('gallery',$g->slug)}}"
                                                           class="f1-m-3 cl0 hov-cl10 trans-03">

                                                            {{$g->description}}
                                                        </a>
                                                    </h5>
                                                    <p>
                                                              <span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										 <span>{{$g->created_at->format('H:i')}}</span>

									</a>

									<span class="m-rl-3">-</span>

									<span>
										{{$g->created_at->diffforhumans()}}
									</span>
                                                                  <span class="m-rl-3">-</span>
                                                                  <span class="f1-s-3 cl8 m-r-15">
                                                                      مشاهدات : {{$g->views}}
                                                                  </span>

                                                              </span>
                                                    </p>


                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>


                            </div>


                        </div>

                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-10 col-lg-4 p-b-30">
                    <div class="p-l-10 p-rl-0-sr991 p-t-70">
                        <!-- Category -->
                        <div class="p-b-30">

                            <div class="flex-c-s">
                                <a href="#">
                                    <img class="max-w-full" src="{{asset(setting('banner'))}} " alt="IMG">
                                </a>
                            </div>
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

                        <!-- Tag -->
                        <div>
                            <div class="how2 how2-cl4 flex-s-c m-b-30">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Tags
                                </h3>
                            </div>

                            <div class="flex-wr-s-s m-rl--5">
                                <a href="#"
                                   class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Fashion
                                </a>

                                <a href="#"
                                   class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Lifestyle
                                </a>

                                <a href="#"
                                   class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Denim
                                </a>

                                <a href="#"
                                   class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Streetstyle
                                </a>

                                <a href="#"
                                   class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Crafts
                                </a>

                                <a href="#"
                                   class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    Magazine
                                </a>

                                <a href="#"
                                   class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    News
                                </a>

                                <a href="#"
                                   class="flex-c-c size-h-2 bo-1-rad-20 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
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
