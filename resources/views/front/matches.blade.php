@extends('front.layouts.index',['title'=>'المباريات'])
<!-- Post -->
@section('main')

    <section class="bg0 ">
        <div class="container">
            <div class="row justify-content-center">

                <div class="container p-t-82">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8 p-b-100">
                            <div class="p-r-10 p-r-0-sr991">
                                <!-- Blog Detail -->
                                <div class="how2 how2-cl5 flex-s-c">
                                    <h3 class="f1-m-2 cl17 tab01-title">
                                        اهم مباريات اليوم
                                    </h3>

                                </div>

                                @foreach ($collection as $ChampionshipName => $matches)
                                    <h3 class="f1-m-2 cl10 tab01-title mt-5 mb-3">
                                       <a href="{{route('standing',championship($matches[0]->ChampionshipId)['id']??'')}}"> <img src="{{championship($matches[0]->ChampionshipId)['logo']??''}}" style="width:60px" >
                                        {{ $ChampionshipName}}
                                       </a>
                                    </h3>


                                @foreach ($matches as $x)

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

                                @endforeach

                            </div>
                        </div>

                        <div class="col-md-10 col-lg-4 p-b-100">
                            <div class="p-b-35">
                                <div class="how2 how2-cl5 flex-s-c">
                                    <h3 class="f1-m-2 cl17 tab01-title">
                                        سوشيال ميديا
                                    </h3>
                                </div>

                                <ul class="p-t-35">
                                    <li class="flex-wr-sb-c p-b-20">
                                        <a href="#" class="size-a-8 flex-c-c borad-49 size-a-8 bg-facebook fs-16 cl0 hov-cl0">
                                            <span class="fab fa-facebook-f"></span>
                                        </a>

                                        <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											6879 متابع
										</span>

                                            <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                                لايك
                                            </a>
                                        </div>
                                    </li>

                                    <li class="flex-wr-sb-c p-b-20">
                                        <a href="#" class="size-a-8 flex-c-c borad-49 size-a-8 bg-twitter fs-16 cl0 hov-cl0">
                                            <span class="fab fa-twitter"></span>
                                        </a>

                                        <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											568 متابع
										</span>

                                            <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                                متابعة
                                            </a>
                                        </div>
                                    </li>

                                    <li class="flex-wr-sb-c p-b-20">
                                        <a href="#" class="size-a-8 flex-c-c borad-49 size-a-8 bg-youtube fs-16 cl0 hov-cl0">
                                            <span class="fab fa-youtube"></span>
                                        </a>

                                        <div class="size-w-3 flex-wr-sb-c">
										<span class="f1-s-8 cl3 p-r-20">
											5039 مشترك
										</span>

                                            <a href="#" class="f1-s-9 text-uppercase cl3 hov-cl10 trans-03">
                                                اشتراك
                                            </a>
                                        </div>
                                    </li>
                                </ul>
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
