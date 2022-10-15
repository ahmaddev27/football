@extends('dashboard.layouts.master',['title'=>'المستخدمين'])
@section('content')




    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4 class="mb-0">تفاصيل المستخدم</h4>
            </div>

        </div>
    </div>
    <!-- widgets -->
    <div class="row">


        <div class="col-xl-8 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    <div class="tab round">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-07-tab" data-toggle="tab" href="#home-07"
                                   role="tab" aria-controls="home-07" aria-selected="false"> <i class="fa fa-user"></i>
                                    المعلومات الشخصية </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="profile-07-tab" data-toggle="tab" href="#profile-07" role="tab"
                                   aria-controls="profile-07" aria-selected="true"><i class="fa fa-key"></i> كلمة المرور</a>
                            </li>


                        </ul>
                        <hr>
                        <form method="post" action="{{route('dashboard.user.update',$user->id)}}">
                            @csrf
                            <div class="tab-content">


                                <div class="tab-pane fade  active show" id="home-07" role="tabpanel"
                                     aria-labelledby="home-07-tab">
                                    <div class="card-body">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-user-o"></i></div>
                                            </div>
                                            <input type="tex" class="form-control" name="name" value="{{$user->name}}"
                                                   id="inlineFormInputGroupUsername2" placeholder="الاسم">
                                        </div>

                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-inbox"></i></div>
                                            </div>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{$user->email}}" id="inlineFormInputGroupUsername2"
                                                   placeholder="البريد">
                                        </div>


                                    </div>
                                </div>


                                <div class="tab-pane fade" id="profile-07" role="tabpanel"
                                     aria-labelledby="profile-07-tab">

                                    <div class="card-body">

                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                            </div>
                                            <input type="password" name="password" class="form-control"
                                                   id="inlineFormInputGroupUsername2" placeholder="كلمة المرور">
                                        </div>

                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                            </div>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                   id="inlineFormInputGroupUsername2" placeholder="تاكيد كلمة المرور">
                                        </div>


                                    </div>
                                </div>


                            </div>
                            <button type="submit" class="button  float-right">حفظ</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>



        <div class="col-xl-4 mb-30">
            <div class="card card-statistics h-100">


                    <div class="card-body">
                        <div class="tab round">
                            <ul class="nav nav-tabs" role="tablist">

                                <li class="nav-item text-center">
                                    <a class="nav-link "  role="tab"
                                    ><i class="fa fa-list"></i> احصائيات المستخدم </a>
                                </li>


                            </ul>
                            <hr>
                        <div class="pricing-table">

                            <div class="pricing-content">
                                <div class="pricing-table-list">
                                    <ul class="list-unstyled">
                                        <li><span class="mr-3 tooltip-content float-left"  ><i class="fa fa-info"></i> </span>   عدد المقالات  <span class="tooltip-content float-right" >{{$user->articles->count()}}</span></li>
                                        <li><span class="mr-3 tooltip-content float-left"  ><i class="fa fa-info"></i> </span>   عدد التعليقات <span class="tooltip-content float-right">{{$user->comments->count()}}</span></li>
                                        <li><span class="mr-3 tooltip-content float-left"  ><i class="fa fa-info"></i> </span>   اخر زيارة  <p class="float-right"> {{$user->last_login_at->diffForHumans() }}</p></li>


                                        <li>

                                                @if($user->isOnline())
                                                    <p  class=" tooltip-content badge badge-pill badge-success  float-right ">متصل</p>
                                                @else
                                                    <div class="  badge badge-pill badge-danger  float-right">غير متصل</div>
                                                @endif



                                        </li>


                                    </ul>



                                </div>
                            </div>
                        </div>



                    </div>
                    </div>





            </div>
        </div>


    </div>



    <!--=================================
     wrapper -->

    <!--=================================
     footer -->

    @push('js')



    @endpush
@stop
