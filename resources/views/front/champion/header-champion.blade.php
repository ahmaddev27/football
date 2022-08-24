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
            <a class="nav-link" href="{{route('videos')}}/?championship={{$championship}}">فيديوهات</a>
        </li>
        <li class="nav-item mt-3">
            <a class="nav-link " href="{{route('galleries')}}/?championship={{$championship}}">صور</a>
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
