
<section class="bg13">
    <div class="container p-t-82 ">
        <div class="row">
            <div class="col-md-10 col-lg-10 p-b-100">
                <div class="p-r-10 p-r-0-sr991">
                    <div class="col-md-10 col-sm col-lg-10 shadow p-3  bg-white rounded">
                        <h3 class="f1-m-5 cl17 tab01-title float-right">
                            جدول  {{$championship}}
                        </h3>
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
                                        <td><img src="{{$x['image']}}" width="40px">  </td>
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
                    </div>

                </div>
            </div>







            <div class="col-md-2 col-lg-2">

                <div class="text-center row shadow p-5 bg-light rounded " >
                    <div class="col-sm mb-5">
                                            <span>
                                                <img src="https://www.filgoal.com/images/soccer.png"> الأهداف <strong>{{ preg_replace('/[^0-9]/', '',$goals)}}</strong>
                                            </span>

                    </div>
                    <div class="col-sm mb-5">
                        <img src="{{asset('front/images/st.png')}}" style="max-width: 22px"> المباريات <strong> {{ preg_replace('/[^0-9]/', '',$matches)}} </strong>
                    </div>
                    <div class="col-sm mb-5 ">
                           <span>
                              <img src="https://www.filgoal.com/images/yc.png"> بطاقات صفراء <strong> {{ preg_replace('/[^0-9]/', '',$yellow)}}  </strong>
                          </span>

                    </div>
                    <div class="col-sm mb-5 ">
                           <span>
                              <img src="https://www.filgoal.com/images/rc.png"> بطاقات حمراء <strong> {{ preg_replace('/[^0-9]/', '',$red)}} </strong>
                          </span>

                    </div>
                </div>
                <div class="text-center  row shadow p-5 bg-light rounded " >
                    <div class="col-sm mb-5">
                                            <span>
                                                <img src="https://www.filgoal.com/images/soccer.png"> الأهداف <strong>{{ preg_replace('/[^0-9]/', '',$goals)}}</strong>
                                            </span>

                    </div>
                    <div class="col-sm mb-5">
                        <img src="{{asset('front/images/st.png')}}" style="max-width: 22px"> المباريات <strong> {{ preg_replace('/[^0-9]/', '',$matches)}} </strong>
                    </div>
                    <div class="col-sm mb-5 ">
                           <span>
                              <img src="https://www.filgoal.com/images/yc.png"> بطاقات صفراء <strong> {{ preg_replace('/[^0-9]/', '',$yellow)}}  </strong>
                          </span>

                    </div>
                    <div class="col-sm mb-5 ">
                           <span>
                              <img src="https://www.filgoal.com/images/rc.png"> بطاقات حمراء <strong> {{ preg_replace('/[^0-9]/', '',$red)}} </strong>
                          </span>

                    </div>
                </div>



            </div>

        </div>
    </div>

</section>
