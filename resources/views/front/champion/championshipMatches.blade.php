@extends('front.layouts.index',['title'=>$championship.' - المباريات'])
<!-- Post -->
@section('main')

    <section class="bg0 ">
        <div class="container">

            @include('front.champion.header-champion',['logo'=>$logo,'championship'=>$championship,
               'slug'=>$slug,'goals'=>$goals,'matches'=>$matches,'yellow'=>$yellow,'red'=>$red])


            <div class="row justify-content-center">
                <div class="container p-t-10">
                    <form>
                        <div class="row mb-2 pr-3">
                            @if(championship($slug)['type']=='0')
                            <div class="col-3">
                                <select class="form-control custom-select " name="week">
                                    <option value="">جميع الاسابيع</option>
                                    @for($i=1;$i<40;$i++)
                                        <option value="{{$i}}" {{request()->week==$i ? 'selected':''}}>الأسبوع {{$i}} </option>
                                    @endfor
                                </select>
                            </div>
                        @endif
                            <div class="col-3">

                                <select class="form-control custom-select " name="team">
                                    <option value="">جميع الفرق</option>
                                    @foreach($teams as $team)
                                        <option  value="{{$team['id']}}" {{request()->team==$team['id'] ? 'selected':''}}>{{$team['name']}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-3">
                                <button type="submit" class="col-4 bg10 text-white btn btn-outline-primary"> <i class="fa fa-search"></i> </button>

                            </div>
                        </div>
                    </form>

                    <div class="row justify-content-center">


                        <div class="col-md-10 col-lg-8 p-b-100">

                            <div class="p-r-10 p-r-0-sr991">
                                <!-- Blog Detail -->



                                @foreach($data as $x)


                                    <div class="shadow-none p-3 mb-2 bg-light rounded">
                                        <div class="col-sm">
                                            <span style="font-size: 13px"> {{$x->WeekOrRound}}</span>
                                        </div>

                                        <div class="row justify-content-center text-center">

                                            <div class="col-sm">
                                                <div class="body text-center">
                                                    <h3>{{$x->HomeTeamName}}
                                                        <img src="{{$x->HomeTeamLogoUrl}}">
                                                    </h3>
                                                </div>

                                            </div>


                                            <div class="col-sm">
                                                <div class=" mt-4 body text-center">
                                                    <strong class=" cl17 ml-2 " style="font-size: 20px"> {{$x->HomeScore??'-'}}</strong>
                                                    <span class=" col-12  {{status($x->CurrentMatchStatus->MatchStatusName)}} text-white">{{$x->CurrentMatchStatus->MatchStatusName}}</span>
                                                    <strong class=" cl17 mr-2 "style="font-size:20px">{{$x->AwayScore??'-'}}</strong>
                                                </div>
                                            </div>

                                            <div class="col-sm">
                                                <div class="body text-center">
                                                    <h3><img src="{{$x->AwayTeamLogoUrl}}"class="ml-2">{{$x->AwayTeamName}}</h3>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="row justify-content-center text-center mt-3 mb-3">
                                            @if($x->StadiumName)
                                                <div class="col-auto">
                                                    <h6 class="f1-s-12 cl8 m-r-12"> <img src="{{asset('front/images/st.png')}}" class="ml-2" style="max-width: 22px"> {{$x->StadiumName}}</h6>
                                                </div>
                                            @endif

                                            <div class="col-auto">
                                                @foreach($x->TvCoverage as $item)
                                                    <h6 class="f1-s-12 cl8 m-r-12"><i class="fa fa-tv ml-2"> </i> {{$item->TvChannelName}} </h6>
                                                @endforeach
                                            </div>

                                            <div class="col-auto">
                                                <h6 class="f1-s-12 cl8 m-r-12">
                                                    <i class="fa fa-calendar ml-2"> </i>  {{  date('y-m-d -  H:i', date( intval(substr(preg_replace('/[^0-9]+/', '', $x->Date ), 0, 10) )))}}
                                                </h6>
                                            </div>
                                        </div>



                                    </div>



                                @endforeach



                            </div>

                            <div class="modal-footer justify-content-center">
                                {{$data->appends(request()->query())->links('vendor.pagination.simple-tailwind')}}
                            </div>
                        </div>


                        <!-- sid bar -->
                        <div class="col-md-10 col-lg-4 p-b-100">
                            <!-- Most Popular -->

                            <div class="flex-c-s p-t-8 p-b-65">
                                <a href="#">
                                    <img class="max-w-full"  src="{{asset(setting('banner_three'))}} " alt="IMG">
                                </a>
                            </div>

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




                            <div class="bg10 p-rl-35 p-t-28 p-b-35 m-b-55">
                                <h5 class="f1-m-5 cl0 p-b-10">
                                    اشتراك
                                </h5>

                                <p class="f1-s-1 cl0 p-b-25">
                                    اشترك في النشرة البريدية للحصول على اشعارات الاخبار والاحداث المهمة
                                </p>

                                <form class="size-a-9 pos-relative">
                                    <input class="s-full f1-m-6 cl6 plh9 p-l-20 p-r-55" type="text" name="email" placeholder="البريد">

                                    <button class="size-a-10 flex-c-c ab-t-l fs-16 cl9 hov-cl10 trans-03">
                                        <i class="fa fa-arrow-left"></i>
                                    </button>
                                </form>
                                <div></div></div>

                            <div class="p-b-30">
                                <div class="how2 how2-cl6 flex-s-c">
                                    <h3 class="f1-m-2 cl18 tab01-title">
                                        اخر الصور من  {{$championship}}
                                    </h3>
                                </div>

                                <div class="flex-wr-sb-s p-t-20 p-b-15 how-bor2">
                                    <div class="flex-c-s">
                                        <div id="carousel2" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">

                                                @foreach(galleries('championship',$championship) as $key=>$g)
                                                    <div class="carousel-item {{$key==0?'active':''}} size-h-4">
                                                        <img class="d-block" style="width:390px;height: 233px"  src="{{asset($g->images[0]->image)}}"
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
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </div>

    </section>

    @push('js')
    @endpush
@stop
