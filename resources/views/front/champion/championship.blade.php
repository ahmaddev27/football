@extends('front.layouts.index',['title'=>$championship])
<!-- Post -->
@section('main')


    @php  if(championship($slug)['type']=='1'){

    $t=1;
            foreach($data as $key=>$x){
                 $data[$key]['gro']=$t;
                if ($x['id']==4){
                    $t++;
                }
            }





$arr = array();

foreach ($data as $key => $item) {
   $arr[$item['gro']][$key] = $item;
}


ksort($arr, SORT_NUMERIC);

}


 @endphp
    <section class="bg0 p-t-20">
        <div class="container">

            @include('front.champion.header-champion',['logo'=>$logo,'championship'=>$championship,
                'slug'=>$slug,'goals'=>$goals,'matches'=>$matches,'yellow'=>$yellow,'red'=>$red])



            <div class="row justify-content-center">

                <div class="col-md-8 col-sm col-lg-8 ">
               @if(championship($slug)['type']==0)
                    <table style=" overflow-x: hidden;" class="table text-center justify-content-center">
                        <thead class="fs-15 bg10 text-white p-4 m-4 h-75">

                        <tr class="fs-15 bg10 text-white p-4 m-4">
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
                        @foreach($data as $key=>$x)

                            <tr class="{{$key%2==1 && $key!=1 ?'bg13':''}}">

                                    <th scope="row" >  {{ $x['id']}}</th>
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





                   @elseif(championship($slug)['type']==1)



                        @foreach  ($arr as $group => $teams)
                        <table style=" overflow-x: hidden;" class="table text-center ">
                            <thead class="bg10 text-white">
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



                                   @foreach ($teams as $team)


                                   <tr class="{{$key%2==1 && $key!=1 ?'bg13':''}}{{$key==1?'bg10 text-white':''}}">

                                       <th scope="row"> {{$team['id']}}</th>
                                       <td><img src="{{$team['image']}}" width="40px"></td>
                                       <td>{{$team['team']}} </td>
                                       <td>{{$team['play']}}</td>
                                       <td>{{$team['home']}}</td>
                                       <td>{{$team['away']}}</td>
                                       <td>{{$team['win']}}</td>
                                       <td>{{$team['lose']}}</td>
                                       <td>{{$team['draw']}}</td>
                                       <td>{{$team['goals']}}</td>
                                       <td>{{$team['goals_in']}}</td>
                                       <td>{{$team['points']}}</td>
                                   </tr>

                                   @endforeach





                                @endforeach
                            </tbody>

                        </table>

                    @endif


                            <div class="row m-rl--1 mt-2 mb-2">

                                @foreach(posts('championship',$championship)->take(8) as $post)
                                <div class="col-sm-6 col-md-3 p-rl-1 p-b-2 mb-3">
                                    <div class="bg-img1 size-a-14 how1 pos-relative" style="background-image: url({{asset($post->image)}});">
                                        <a href="{{route('post',$post->slug)}}" class="dis-block how1-child1 trans-03"></a>

                                        <div class="flex-col-e-s s-full p-rl-25 p-tb-20">


                                            <h3 class="how1-child2 m-t-14">
                                                <a href="{{route('post',$post->slug)}}" class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                                  {{str_limit($post->title,150)}}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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
                                                <span class=" col-12 text-center {{status($x['status'])}} text-white">{{$x['status']}}</span>


                                            </h6>

                                            <h5 class="f1-s-10 cl2 hov-cl10 trans-03">
                                                {{$x['team1']}}
                                                <img style="width:50px" src="{{$x['img1']}}">
                                                {{ $x['team1_result'] }}  : {{ $x['team2_result'] }}
                                                <img style="width:50px" src="{{$x['img2']}}"> {{$x['team2']}}

                                            </h5>
                                            <h6 class="mt-3 text-center text-muted">{{ substr($x['time'],0,10)}}</h6>

                                        </div>
                                    </div>

                            </div>
                            @endforeach
                        </div>

                        <!-- Most Popular -->

                        @if(championship($slug)['type']=='1')
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
                        @endif

                        <!--  -->
                        <div class="flex-c-s p-t-8 p-b-65">
                            <a href="#">
                                <img class="max-w-full" src="{{asset('front/images/banner-02.jpg')}}" alt="IMG">
                            </a>
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
