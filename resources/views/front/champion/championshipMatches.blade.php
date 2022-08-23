@extends('front.layouts.index',['title'=>$championship.' - المباريات'])
<!-- Post -->
@section('main')

    <section class="bg0 ">
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


            <div class="row justify-content-center">

                <div class="container p-t-10">

                    <form>
                        <div class="row mb-2 pr-3">

                            <div class="col-3">

                                <select class="form-control custom-select  " name="week">
                                    <option value="">جميع الاسابيع</option>

                                    @for($i=1;$i<40;$i++)
                                        <option value="{{$i}}" {{request()->week==$i ? 'selected':''}}>الأسبوع {{$i}} </option>
                                    @endfor
                                </select>

                            </div>
                            <div class="col-3">

                                <select class="form-control custom-select " name="team">
                                    <option value="">جميع الفرق</option>
                                    @foreach($teams as $team)
                                        <option value="{{$team['id']}}" {{request()->team==$team['id'] ? 'selected':''}}>{{$team['name']}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-3">
                                <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> </button>

                            </div>
                        </div>
                    </form>

                    <div class="row justify-content-center">


                        <div class="col-md-10 col-lg-8 p-b-100">

                            <div class="p-r-10 p-r-0-sr991">
                                <!-- Blog Detail -->



                                @foreach($data as $x)

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



                            </div>

                            <div class="modal-footer justify-content-center">
                                {{$data->appends(request()->query())->links('vendor.pagination.simple-tailwind')}}
                            </div>
                        </div>

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


                            <div class="p-b-30">
                                <div class="how2 how2-cl6 flex-s-c">
                                    <h3 class="f1-m-2 cl18 tab01-title">
                                        اخر الصور من  {{$championship}}
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


                        </div>


                    </div>

                    </div>

                </div>
            </div>

    </section>

    @push('js')
    @endpush
@stop
