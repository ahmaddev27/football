@extends('front.layouts.index',['title'=>$article->title])
<!-- Post -->

@section('main')

    <section class="bg0 p-b-70 p-t-5">


        @auth('web')
        @if(auth('web')->id()==$article->user->id)
            <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
                <div class="f2-s-1 p-r-30 m-tb-6">
                    <p class="breadcrumb-item f1-s-3 cl9">
                        حالة المقال الخاص بك  :

                        @if($article->status=='منشور')
                            <span class="text-center  size-a-10 bg19 borad-5 f1-s-12 cl0 hov-btn1 ">تم النشر</span>
                        @else
                            <span class="text-center  size-a-10 bg18 borad-5 f1-s-12 cl0 hov-btn1 "> تدقيق</span>
                        @endif

                    </p>


                </div>

            </div>
        @endif

    @else
            <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
                <div class="f2-s-1 p-r-30 m-tb-6">

            <p class="breadcrumb-item f1-s-3 cl9">
            حالة المقال   :


        @if($article->status=='منشور')
                <span class="text-center  size-a-10 bg19 borad-5 f1-s-12 cl0 hov-btn1 ">تم النشر</span>
            @else
                <span class="text-center  size-a-10 bg18 borad-5 f1-s-12 cl0 hov-btn1 "> تدقيق</span>
        @endif
        </p>
                </div>
            </div>
    @endauth
        <!-- Title -->
        <div class="bg-img1 size-a-12 how-overlay1" style="background-image: url({{asset('front/images/icons/footballer.png')}});">
            <div class="container h-full flex-col-e-c p-b-58">


                <h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
                    {{$article->title}}
                </h3>

                <div class="flex-wr-c-s">
					<span class="f1-s-3 cl0 m-rl-7 txt-center">
						<a href="#" class="f1-s-4 cl0 hov-cl10 trans-03">
							بواسطة : {{$article->user->name}}
						</a>

						<span class="m-rl-3">-</span>
						<span>{{$article->updated_at->format('H:i')}}</span>

                        <span class="m-rl-3">-</span>


						<span> {{$article->updated_at->format('d M')}}</span>


					</span>

                    <span class="f1-s-3 cl0 m-rl-7 txt-center">

					قراءة	{{$article->views}}
					</span>

                    <a href="" class="f1-s-3 cl0 m-rl-7 txt-center hov-cl10 trans-03">
                        تعليقات {{$article->comments->count()}}
                    </a>
                </div>
            </div>
        </div>

        <!-- Detail -->
        <div class="container p-t-82">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-100">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">
                            <p class="f1-s-11 cl6 p-b-25">

                                {!! $article->details !!}

                            </p>

                            <br>

                            <hr>



                            <!-- Share -->
                            <div class="flex-s-s mt-5">
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

                    @auth('web')
                        <!-- Leave a comment -->
                        <div>
                            <h4 class="f1-l-4 cl3 p-b-12">
                             اترك تعليقك
                            </h4>

                            <form id="form">

                                <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="comment" placeholder="تعليق ..."></textarea>

                                <button id="submit" class=" float-l size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                                   نشر التعليق
                                </button>
                            </form>

                        </div>

                        @endauth
                    </div>
                </div>

                <div class="col-md-10 col-lg-4 p-b-100">
                    <div class="p-l-10 p-rl-0-sr991">
                        <!-- Banner -->
                        <div class="flex-c-s">
                            <a href="#">
                                <img class="max-w-full" src="{{asset(setting('banner'))}}" alt="IMG">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop




{{--<div class="col-md-10 col-lg-4 p-b-30">--}}
{{--    <div class="p-l-10 p-rl-0-sr991 p-t-70">--}}
{{--        <!-- Category -->--}}
{{--        <div class="p-b-60">--}}
{{--            <div class="how2 how2-cl4 flex-s-c">--}}
{{--                <h3 class="f1-m-2 cl3 tab01-title">--}}
{{--                    التصنيفات--}}
{{--                </h3>--}}
{{--            </div>--}}

{{--            <ul class="p-t-35">--}}

{{--                @foreach(categories() as $c)--}}
{{--                    <li class="how-bor3 p-rl-4">--}}
{{--                        <a href="{{route('search')}}/?search={{$c}}" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">--}}
{{--                            {{$c->name}}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}

{{--            </ul>--}}
{{--        </div>--}}



{{--        <!-- Popular Posts -->--}}
{{--        <div class="p-b-30">--}}
{{--            <div class="how2 how2-cl4 flex-s-c">--}}
{{--                <h3 class="f1-m-2 cl3 tab01-title">--}}
{{--                    الأكثر مشاهدة--}}
{{--                </h3>--}}
{{--            </div>--}}

{{--            <ul class="p-t-35">--}}
{{--                @foreach(posts(null,null)->take(3) as $x)--}}
{{--                    <li class="flex-wr-sb-s p-b-30">--}}
{{--                        <a href="{{route('post',$x->slug)}}" class="size-w-10 wrap-pic-w hov1 trans-03">--}}
{{--                            <img src="{{asset($x->image)}}" alt="IMG">--}}
{{--                        </a>--}}

{{--                        <div class="size-w-11">--}}
{{--                            <h6 class="p-b-4">--}}
{{--                                <a href="{{route('post',$x->slug)}}" class="f1-s-5 cl3 hov-cl10 trans-03">--}}
{{--                                    {{str_limit($x->title,50)}}--}}
{{--                                </a>--}}
{{--                            </h6>--}}

{{--                            <span class="cl8 txt-center p-b-24">--}}
{{--                                            <span class="f1-s-3 " >{{$x->created_at->format('H:i')}}</span>--}}

{{--											<span class="f1-s-3 m-rl-3">--}}
{{--												---}}
{{--											</span>--}}

{{--											<span class="f1-s-3">--}}
{{--                                                {{$x->created_at->diffforhumans()}}--}}

{{--											</span>--}}
{{--										</span>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                @endforeach--}}

{{--            </ul>--}}
{{--        </div>--}}

{{--        <!-- Tag -->--}}
{{--        <div class="p-b-55">--}}
{{--            <div class="how2 how2-cl4 flex-s-c m-b-30">--}}
{{--                <h3 class="f1-m-2 cl3 tab01-title">--}}
{{--                    تاجات--}}
{{--                </h3>--}}
{{--            </div>--}}

{{--            <div class="flex-wr-s-s m-rl--5">--}}
{{--                <a href="{{route('search')}}/?search=ابطال اوروبا"--}}
{{--                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">--}}
{{--                    ابطال اوروبا--}}
{{--                </a>--}}

{{--                --}}{{--                                <a href="{{route('search')}}/?search=كأس العالم"--}}
{{--                --}}{{--                                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">--}}
{{--                --}}{{--                                    كأس العالم--}}
{{--                --}}{{--                                </a>--}}

{{--                <a href="{{route('search')}}/?search=الدوري الانجليزي"--}}
{{--                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">--}}
{{--                    الانجليزي--}}
{{--                </a>--}}

{{--                <a href="{{route('search')}}/?search=الدوري الاسباني"--}}
{{--                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">--}}
{{--                    الاسباني--}}
{{--                </a>--}}
{{--                <a href="{{route('search')}}/?search=الدوري الايطالي"--}}
{{--                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">--}}
{{--                    الايطالي--}}
{{--                </a>--}}

{{--                <a href="{{route('search')}}/?search=الدوري الالماني"--}}
{{--                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">--}}
{{--                    الالماني--}}
{{--                </a>--}}

{{--                <a href="{{route('search')}}/?search=الدوري الفرنسي"--}}
{{--                   class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">--}}
{{--                    الفرنسي--}}
{{--                </a>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


@push('js')




@endpush
