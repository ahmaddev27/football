@extends('front.index',['title'=>$championship])
<!-- Post -->
@section('main')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">




    <section class="bg0 p-t-20">
        <div class="container">

            <h3 class="cl6 text-center mb-2">
                <img src="{{$logo}}">  <b>{{$championship}}</b>
            </h3>
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

                    <table style=" overflow-x: hidden;" class="table table-striped text-center">
                        <thead>

                        <tr class="fs-15">
                            <th scope="col">الترتيب</th>
                            <th scope="col">*</th>
                            <th scope="col">الفريق</th>
                            <th scope="col">لعب</th>
                            <th scope="col">داخل</th>
                            <th scope="col">خارج</th>
                            <th scope="col">فوز</th>
                            <th scope="col">هزيمة</th>
                            <th scope="col">تعادل</th>
                            <th scope="col">له</th>
                            <th scope="col">عليه</th>
                            <th scope="col">نقاط</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($data as $x)

                            @if($x['id']==1)
                                <tr class="thead-dark">
                            @else
                                <tr class="">
                                    @endif

                                    <th scope="row"> {{$x['id']}}</th>
                                    <td><img src="{{$x['image']}}" width="40px"></td>
                                    <td>{{$x['team']}} </td>
                                    <td>{{$x['play']}}</td>
                                    <td>{{$x['home']}}</td>
                                    <td>{{$x['away']}}</td>
                                    <td>{{$x['win']}}</td>
                                    <td>{{$x['lose']}}</td>
                                    <td>{{$x['draw']}}</td>
                                    <td>{{$x['goals']}}</td>
                                    <td>{{$x['goals_in']}}</td>
                                    <td>{{$x['points']}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>

                    <div class="p-b-35">
                        <div class="how2 how2-cl5 flex-s-c">
                            <h3 class="f1-m-2 cl17 tab01-title">
                                قائمة الهدافين
                            </h3>
                        </div>

                        <ul class="p-t-35">

                            <table style=" overflow-x: hidden;" class="table table-striped text-center">
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

                                    @if($key==1)
                                        <tr class="fs-15 thead-dark">
                                    @else
                                        <tr class="">
                                            @endif

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
@stop
