@extends('front.layouts.index',['title'=>'الصفحة الشخصية'])
<!-- Post -->

@section('main')



    <section class="bg0 p-b-140 p-t-10">


        <div class="text-center row bg13 p-4 m-4 justify-content-center">
            <ul class="nav justify-content-center">
                <li class="nav-item f1-m-1 cl2 hov-cl10 trans-03">
                    <h5>الصفحة الشخصية</h5>

                </li></ul>
        </div>
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-30">

                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->

                        <form method="post" action="{{route('update.profile')}}">
                            @csrf
                        <div class="row ">

                            <div class="col-lg-8 card shadow-sm p-3 mb-5 bg-white rounded">
                                <nav class="p-3">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-user"></i> المعلومات الشخصية</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-key"></i> كلمة المرور</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">الاسم</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="" value="{{auth()->user()->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPassword3" class="col-sm-2 col-form-label">البريد </label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="email" placeholder="" value="{{auth()->user()->email}}">
                                                </div>
                                            </div>



                                    </div>

                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">كلمة المرور</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">كلمة المرور</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-10 ">
                                    <button type="submit" class="size-a-20 bg19 borad-12 f1-s-12 cl0 hov-btn1 trans-03  float-l">
                                        حفظ التعديلات
                                    </button>
                                </div>

                            </div>

                            <div class="col-lg-4 ">
                                <div class="card shadow-sm p-3 mb-5 bg-white rounded ">
                                    <div class="card-header">
                                        الاحصائيات
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">المقالات <span class="text-center  size-a-1 bg19 borad-12 f1-s-12 cl0 hov-btn1  float-l">{{auth()->user()->articles->count()}}</span> </h5>
                                        <h5 class="card-title">التعليقات <span class="text-center  size-a-1 bg19 borad-12 f1-s-12 cl0 hov-btn1  float-l">{{auth()->user()->comments->count()}}</span> </h5>
                                        <h5 class="card-title"> اخر زيارة  <span class="float-left ">{{auth()->user()->last_login_at->diffForHumans() }}</span> </h5>

                                    </div>


                                </div>
                            </div>


                        </div>


                        </form>

                    </div>

                    <hr>
                 <div class="p-r-10 p-r-0-sr991 pt-5">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr class="text-right">
                                <th>#</th>
                                <th>عنوان المقال</th>
                                <th>حالة المقال</th>
                                <th > عدد المشاهدات </th>
                                <th>عدد التعليقات </th>
                                <th>وقت الكتابة  </th>
                                <th>وقت النشر </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(auth()->user()->articles as $x)
                                <tr class="text-right">
                                    <td >{{$loop->index+1}}</td>
                                    <td ><a href="{{route('view.article',$x->slug)}}" >{{$x->title}}</a></td>
                                    @if($x->status=='منشور')
                                        <td>   <span class="  size-a-12 bg19 borad-5 f1-s-12 cl0 hov-btn1 ">تم النشر</span>
                                        </td>
                                    @else
                                        <td>  <span class="size-a-12 bg18 borad-5 f1-s-12 cl0 hov-btn1 "> تدقيق</span>
                                        </td>
                                    @endif
                                    <td >{{$x->views}}</td>
                                    <td>{{$x->comments->count()}}</td>
                                    <td>{{$x->created_at->format('Y d m / H:i')}}</td>
                                    <td>{{@$x->updated_at->format('Y d m / H:i')}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>




                </div>
          </div>
    </section>


@stop







@push('js')




@endpush
