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
                                        <img src="{{championship($matches[0]->ChampionshipId)['logo']??''}}" style="width:60px" >
                                        {{ $ChampionshipName}}

                                    </h3>


                                @foreach ($matches as $x)



                                    <div class="shadow-none p-3 mb-2 bg-light rounded">

                                            <div class="row">


                                                <div class="col-sm-2 pr-5 p-3">
                                                    <span style="font-size: 13px"> {{$x->WeekOrRound}}</span>
                                                </div>

                                                <div class="col-sm-3 pr-5 p-3">
                                                    <div class="body text-center">
                                                        <h3 class="mb-1">{{$x->HomeTeamName}}</h3>
                                                        <img src="{{$x->HomeTeamLogoUrl}}">
                                                    </div>
                                                </div>



                                                <div class="col-sm-3 pr-5 p-3">

                                                    <div class="body text-center">
                                                        <strong class="mb-3 cl17 ml-2 " style="font-size: 20px"> {{$x->HomeScore}}</strong>
                                                        <span class="badge badge-{{status($x->CurrentMatchStatus->MatchStatusName)}}"style="font-size: 13px"> {{$x->CurrentMatchStatus->MatchStatusName}}</span>
                                                        <strong class="mb-3 cl17 mr-2 "style="font-size:20px">{{$x->AwayScore}}</strong>
                                                        <br> <i class="fa fa-calendar mt-3 "> </i>  <br>
                                                        <p class="">
                                                            {{  date('y-m-d /  H:i', date( intval(substr(preg_replace('/[^0-9]+/', '', $x->Date ), 0, 10) )))}}
                                                        </p>
                                                    </div>

                                                </div>

                                                <div class="col-sm-4 pr-5 p-3">
                                                    <div class="body text-center">
                                                        <h3 class="mb-1">{{$x->AwayTeamName}}</h3>
                                                        <img src="{{$x->AwayTeamLogoUrl}}">
                                                    </div>
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
