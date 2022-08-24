@extends('front.layouts.index',['title'=>'مكتبة الفيديوهات'])
<!-- Post -->

@section('main')



    <section class="bg0 p-b-140 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">

                            <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2 ">
                                معرض الفيديوهات
                            </h3>

                            <form>
                                <div class="row mb-2 pr-3">
                                    <div class="col-8">
                                        <select class="form-control custom-select  " name="championship">
                                            <option value="">جميع الدوريات</option>
                                            @foreach(championship(null,null) as $ch)
                                                <option value="{{$ch['name']}}" {{request()->championship==$ch['name'] ? 'selected':''}}>{{$ch['name']}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> </button>

                                    </div>
                                </div>
                            </form>


                            <div class="flex-wr-s-s p-b-40">

                                <div class="row">

                                    @foreach(videos('championship',request()->championship) as $v)

                                        <div class="col-md-6 col-sm mb-5">

                                            <div class="">
                                                <img class="d-block w-100 wrap-pic-w hov1 trans-03"  src="{{asset($v->image)}}"
                                                     alt="First slide">

                                                <div class="p-tb-16 p-rl-25 bg3" style="min-height:150px">
                                                    <h5 class="p-b-5">
                                                        <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">

                                                            <button id="view" class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03"   data-toggle="modal" data-target="#modal-video-01" model_id="{{$v->id}}">
                                                                <span class="mb-5 fab fa-youtube"></span><div></div>
                                                            </button>
                                                            {{$v->title}}
                                                        </a>
                                                    </h5>
                                                    <p class="mt-5">
                                                              <span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										 <span>{{$v->created_at->format('H:i')}}</span>

									</a>

									<span class="m-rl-3">-</span>

									<span>
										{{$v->created_at->diffforhumans()}}
									</span>
                                                                  <span class="m-rl-3">-</span>
                                                                  <span class="f1-s-3 cl8 m-r-15">
                                                                      مشاهدات : {{$v->views}}
                                                                  </span>

                                                              </span>
                                                    </p>


                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>



                        </div>

                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-10 col-lg-4 p-b-30">
                    <div class="p-l-10 p-rl-0-sr991 p-t-70">
                        <!-- Category -->
                        <div class="p-b-30">

                        <div class="flex-c-s">
                            <a href="#">
                                <img class="max-w-full" src="{{asset(setting('banner_three'))}} " alt="IMG">
                            </a>
                        </div>
                        </div>


                        <!-- Popular Posts -->
                        <div class="p-b-30">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    الأكثر قراءة
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach(posts(null,null)->take(3) as $x)
                                    <li class="flex-wr-sb-s p-b-30">
                                        <a href="{{route('post',$x->slug)}}" class="size-w-10 wrap-pic-w hov1 trans-03">
                                            <img src="{{asset($x->image)}}" alt="IMG">
                                        </a>

                                        <div class="size-w-11">
                                            <h6 class="p-b-4">
                                                <a href="{{route('post',$x->slug)}}"
                                                   class="f1-s-5 cl3 hov-cl10 trans-03">
                                                    {{str_limit($x->title,50)}}
                                                </a>
                                            </h6>

                                            <span class="cl8 txt-center p-b-24">
                                            <span class="f1-s-3 ">{{$x->created_at->format('H:i')}}</span>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
                                                {{$x->created_at->diffforhumans()}}

											</span>
										</span>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>

                        <div class="p-b-55">
                            <div class="how2 how2-cl4 flex-s-c m-b-30">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    تاجات
                                </h3>
                            </div>

                            <div class="flex-wr-s-s m-rl--5">
                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    ابطال اوروبا
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    كأس العالم
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    انجلترا
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    اسبانيا
                                </a>
                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    ايطاليا
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    المانيا
                                </a>

                                <a href="#" class="flex-c-c size-h-2 bo-1-rad-10 bocl12 f1-s-1 cl8 hov-btn2 trans-03 p-rl-20 p-tb-5 m-all-5">
                                    فرنسا
                                </a>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Video 01-->
    <div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document" data-dismiss="modal">
            <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

            <div class="wrap-video-mo-01">
                <div class="video-mo-01">
                    <iframe id="link-video" src="" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>



@stop




@push('js')

    <script>
        $(document).on('click', '#view', function(){
            var id = $(this).attr("model_id");
            $.ajax({
                url:"{{route('video.ajax.data')}}",
                method:'get',
                data:{id:id},
                dataType:'json',
                success:function(data)
                {

                    $('#link-video').attr('src',data.link);


                }
            })
        });
    </script>
@endpush
