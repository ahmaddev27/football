@extends('dashboard.layouts.master',['title'=>'الرئيسية'])
@section('content')



        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h5 class="mb-0"> الرئيسية , أهلا وسهلا بك </h5>
                </div>

            </div>
        </div>
        <!-- widgets -->



        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 mb-30">
                <div class="card card-statistics h-100 rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left icon-box bg-primary rounded">
                  <span class="text-white">
                    <i class="ti ti-view-list-alt highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">الأخبار</p>
                                <h4>{{posts(null,null)->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 mb-30">
                <div class="card card-statistics h-100 rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left icon-box bg-primary rounded">
                  <span class="text-white">
                    <i class="ti ti-pie-chart highlight-icon " aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">التصنيفات</p>
                                <h4>{{category(null)->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 mb-30">
                <div class="card card-statistics h-100 rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left icon-box bg-primary rounded">
                  <span class="text-white">
                    <i class="fa fa-user-o highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">الأعضاء</p>
                                <h4>{{\App\Models\User::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 mb-30">
                <div class="card card-statistics h-100 rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left icon-box bg-primary rounded">
                  <span class="text-white">
                    <i class="ti ti-write highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">المقالات</p>
                                <h4>{{\App\Models\Article::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 mb-30">
                <div class="card card-statistics h-100 rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left icon-box bg-primary rounded">
                  <span class="text-white">
                    <i class="ti ti-comment highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">التعليقات</p>
                                <h4>{{\App\Models\Comment::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 mb-30">
                <div class="card card-statistics h-100 rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left icon-box bg-primary rounded">
                  <span class="text-white">
                    <i class="ti ti-email highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">الرسائل</p>
                                <h4>{{\App\Models\inbox::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 mb-30">
                <div class="card card-statistics h-100 rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left icon-box bg-primary rounded">
                  <span class="text-white">
                    <i class="ti ti-gallery highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">البومات الصور</p>
                                <h4>{{\App\Models\Gallery::count()}}</h4>  {{\App\Models\image::count()}} صورة
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 mb-30">
                <div class="card card-statistics h-100 rounded">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-left icon-box bg-primary rounded">
                  <span class="text-white">
                    <i class="ti ti-video-camera highlight-icon" aria-hidden="true"></i>
                  </span>
                            </div>
                            <div class="float-right text-right">
                                <p class="card-text text-dark">الفيديوهات</p>
                                <h4>{{\App\Models\Video::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>








        <div class="row">


            <div class="col-md-4 mb-30 ">
                <div class="card rounded">
                    <div class="card-body">
                        <h5 class="card-title">اجرائات سريعة </h5>
                        <div class="text-dark">

                            <div class="row text-center justify-content-center">

                                <div class="col-xl-4 col-lg-4 col-md-4 mb-30 ">
                                    <a href="{{route('home')}}"><i class="ti-home highlight-icon" aria-hidden="true"></i><br>
                                          الرئيسية
                                    </a>
                                </div>


                                <div class="col-xl-4 col-lg-4 col-md-4 mb-30">
                                    <a href="{{route('dashboard.settings.index')}}"> <i class="ti-settings highlight-icon" aria-hidden="true"></i><br>
                                        الاعدادات
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 mb-30">
                                    <a href="{{route('dashboard.post.create')}}"><i class="ti-plus highlight-icon" aria-hidden="true"></i><br>
                                       جديد خبر
                                    </a>
                                </div>


                                <div class="col-xl-4 col-lg-4 col-md-4 mb-30">
                                    <a href="{{route('dashboard.profile')}}"><i class="ti-user highlight-icon" aria-hidden="true"></i><br>
                                       البروفايل
                                    </a>
                                </div>


                                <div class="col-xl-4 col-lg-4 col-md-4 mb-30">
                                    <a href="{{route('dashboard.notifications.all')}}"><i class="ti-bell highlight-icon" aria-hidden="true"></i><br>
                                        الاشعارات
                                    </a>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 mb-30">
                                    <a href="{{route('dashboard.logout')}}"><i class="ti-lock highlight-icon" aria-hidden="true"></i><br>
                                        خروج
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-4 mb-30 ">
                <div class="card rounded">
                    <div class="card-body">
                        <h5 class="card-title">المقالات </h5>
                        <div id="morris-donut" style="height: 220px;">

                            @php $x=4; @endphp
                </div>
            </div>
        </div>
        </div>


            <div class="col-md-4 mb-30 ">
                <div class="card rounded">
                    <div class="card-body">
                        <h5 class="card-title">الرسائل </h5>
                        <div id="morris-donut2" style="height: 220px;">

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
        <script type="text/javascript">

                    Morris.Donut({
                            element: 'morris-donut',
                            data: [

                                {label: "المقالات الغير منشورة", value: {{\App\Models\Article::where('status','معلق')->count()}}},
                                {label: "المقالات المنشورة", value: {{\App\Models\Article::where('status','منشور')->count()}}},

                            ],
                            resize: true,
                            colors: ['#343a40', "#007bff"]
                        });
        </script>


        <script type="text/javascript">

            Morris.Donut({
                element: 'morris-donut2',
                data: [

                    {label: "الرسائل المردود عليها", value: {{\App\Models\inbox::where('is_replay',1)->count()}}},
                    {label: "الرسائل الغير مردود عليها", value: {{\App\Models\inbox::where('is_replay',0)->count()}}},

                ],
                resize: true,
                colors: ['#343a40', "#007bff"]
            });
        </script>

    @endpush
@stop
