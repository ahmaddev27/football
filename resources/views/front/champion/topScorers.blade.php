@extends('front.layouts.index',['title'=>$championship.' - الهدافون'])
<!-- Post -->
@section('main')



    <section class="bg0 p-t-20">
        <div class="container">
            <div class="text-center row bg13 p-4 m-4 justify-content-center">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <img src="{{$logo}}"> <b>{{$championship}}</b>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link" href="{{route('standing',$slug)}}">التريب</a>
                    </li>

                    <li class="nav-item mt-3">
                        <a class="nav-link" href="{{route('standing.matches',$slug)}}">المباريات</a>
                    </li>

                    <li class="nav-item mt-3">
                        <a class="nav-link active" href="#">أخبار</a>
                    </li>

                    <li class="nav-item mt-3">
                        <a class="nav-link active" href="{{route('scorers',$slug)}}">الهدافون</a>
                    </li>


                    <li class="nav-item mt-3">
                        <a class="nav-link " href="#">فيديوهات</a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link " href="#">صور</a>
                    </li>
                </ul>
            </div>



            <div class="text-center row bg13 p-4 mb-4">
                <div class="col-sm ">
                    <span>
                        <img src="https://www.filgoal.com/images/soccer.png"> الأهداف <strong>{{ preg_replace('/[^0-9]/', '',$goals)}}</strong>
                    </span>
                </div>
                <div class="col-sm">
                    <img src="{{asset('front/images/st.png')}}" style="max-width: 22px"> المباريات
                    <strong> {{ preg_replace('/[^0-9]/', '',$matches)}} </strong>
                </div>
                <div class="col-sm "><span><img src="https://www.filgoal.com/images/yc.png"> بطاقات صفراء <strong> {{ preg_replace('/[^0-9]/', '',$yellow)}}  </strong></span></div>
                <div class="col-sm ">
                           <span>
                              <img
                                  src="https://www.filgoal.com/images/rc.png"> بطاقات حمراء <strong> {{ preg_replace('/[^0-9]/', '',$red)}} </strong>
                          </span>

                </div>
            </div>



            <div class="row justify-content-center">

                <div class="col-md-8 col-sm col-lg-8 ">

                    <div class="p-b-35">
                        <div class="how2 how2-cl5 flex-s-c">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                قائمة الهدافين
                            </h3>
                        </div>

                        <ul class="p-t-35">

                            <table style=" overflow-x: hidden;" class="table text-center">
                                <thead>

                                <tr class="fs-15">
                                    <th scope="col">#</th>
                                    <th scope="col">صورة اللاعب</th>
                                    <th scope="col">اللاعب</th>
                                    <th scope="col">المباريات</th>
                                    <th scope="col">الاهداف</th>
                                    <th scope="col">النسبة</th>
                                </tr>

                                </thead>
                                <tbody>

                                @foreach($topScorers as $key=>$x)


                                        <tr class="{{$key%2==1 && $key!=1 ?'bg13':''}}{{$key==1?'bg10 text-white':''}}">
                                            <th scope="row"> {{$key}}</th>
                                            <td class=""><img src="{{$x['image']}}"width="70px"></td>
                                            <td>{{$x['name']}} </td>
                                            <td>{{$x['matches']}}</td>
                                            <td>{{$x['goals']}}</td>

                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width:{{$x['percentage']}};" aria-valuenow=" {{$x['percentage']}}" aria-valuemin="0" >  {{$x['percentage']}}</div>
                                                </div>



                                            </td>

                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>


                            <div class="modal-footer justify-content-center">
                            {{$topScorers->links('vendor.pagination.simple-tailwind')}}
                            </div>


                        </ul>
                    </div>
                </div>


                <div class="col-md-4 col-lg-4 text-center bg0 ">
                    <div class="p-l-10 p-rl-0-sr991 p-b-20">
                        <!-- سوشيال -->

                        <div class="row shadow-none p-3 mb-2 bg-light rounded">


                            @foreach($todaymatches as $x)

                                <div class="col-sm-12 p-r-25 col-lg-12 p-r-15-sr991">
                                    <!-- Item latest -->
                                    <div class="m-b-40 text-center">
                                        <div class="p-t-16">

                                            <h6 class="f1-s-10 cl2 hov-cl10 text-right">
                                                <span class="badge badge-{{status($x['status'])}}"> <b class="text-end">{{$x['status']}}</b></span>

                                            </h6>

                                            <h5 class="f1-s-10 cl2 hov-cl10 trans-03">
                                                {{$x['team1']}}
                                                <img style="width:50px" src="{{$x['img1']}}">
                                                {{ $x['team1_result'] }}  : {{ $x['team2_result'] }}
                                                <img style="width:50px" src="{{$x['img2']}}"> {{$x['team2']}}

                                            </h5>

                                            <h6 class="mt-1 text-center text-muted">{{$x['time']}}</h6>


                                        </div>
                                    </div>



                                </div>
                            @endforeach
                        </div>

                        <!-- Most Popular -->
                        <div class="p-b-30">
                            <div class="how2 how2-cl6 flex-s-c">
                                <h3 class="f1-m-2 cl18 tab01-title">
                                    اخر اخبار  {{$championship}}
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach(posts('championship',$championship)->take(6) as $c)
                                    <li class="flex-wr-sb-s p-b-22">
                                        <div class="size-a-8 flex-c-c borad-45 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                        <a href="{{route('post',$c->slug)}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                            {{str_limit($c->title,35)}}
                                        </a>
                                    </li>



                                @endforeach

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






    @push('js')

    @endpush
@stop
