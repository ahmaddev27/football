@extends('front.layouts.index',['title'=>$article->title])
<!-- Post -->

@section('main')

    <section class="bg0 p-b-70 p-t-5">


        @auth('web')
            @if(auth('web')->id()==$article->user->id)
                <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
                    <div class="f2-s-1 p-r-30 m-tb-6">
                        <p class="breadcrumb-item f1-s-3 cl9">
                            حالة المقال الخاص بك  :

                        @if($article->status=='منشور')
                            <span class="text-center  size-a-10 bg19 borad-5 f1-s-12 cl0 hov-btn1 ">تم النشر</span>
                        @else
                            <span class="text-center  size-a-10 bg18 borad-5 f1-s-12 cl0 hov-btn1 "> تدقيق</span>
                        @endif

                    </p>


                </div>

            </div>
        @endif
        @endauth

                @auth('admin')
            <div class="headline bg0 flex-wr-sb-c p-rl-20 p-tb-8">
                <div class="f2-s-1 p-r-30 m-tb-6">

            <p class="breadcrumb-item f1-s-3 cl9">
            حالة المقال   :


        @if($article->status=='منشور')
                <span class="text-center  size-a-10 bg19 borad-5 f1-s-12 cl0 hov-btn1 ">تم النشر</span>
            @else
                <span class="text-center  size-a-10 bg18 borad-5 f1-s-12 cl0 hov-btn1 "> تدقيق</span>
        @endif
        </p>
                </div>
            </div>
    @endauth
        <!-- Title -->
        <div class="bg-img1 size-a-12 how-overlay1" style="background-image: url({{asset('front/images/icons/footballer.png')}});">
            <div class="container h-full flex-col-e-c p-b-58">


                <h3 class="f1-l-5 cl0 p-b-16 txt-center respon2">
                    {{$article->title}}
                </h3>

                <div class="flex-wr-c-s">
					<span class="f1-s-3 cl0 m-rl-7 txt-center">
						<a href="#" class="f1-s-4 cl0 hov-cl10 trans-03">
							بواسطة : {{$article->user->name}}
						</a>

						<span class="m-rl-3">-</span>
						<span>{{$article->updated_at->format('H:i')}}</span>

                        <span class="m-rl-3">-</span>


						<span> {{$article->updated_at->format('d M')}}</span>


					</span>

                    <span class="f1-s-3 cl0 m-rl-7 txt-center">

					قراءة	{{$article->views}}
					</span>

                    <a href="" class="f1-s-3 cl0 m-rl-7 txt-center hov-cl10 trans-03">
                        تعليقات {{$article->comments->count()}}
                    </a>
                </div>
            </div>
        </div>

        <!-- Detail -->
        <div class="container p-t-30">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-100">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="bg0">

                        <p class="f1-s-11 cl6 p-b-25">

                                {!! $article->details !!}

                            </p>

                            <br>

                            <hr>



                            <!-- Share -->
                            <div class="flex-s-s mt-5">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									مشاركة :
								</span>

                                <div class="flex-wr-s-s size-w-0">
                                    <a href="#" class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-facebook-f m-r-7"></i>
                                        Facebook
                                    </a>

                                    <a href="#" class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-twitter m-r-7"></i>
                                        Twitter
                                    </a>

                                    <a href="#" class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-google-plus-g m-r-7"></i>
                                        Google+
                                    </a>

                                    <a href="#" class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-pinterest-p m-r-7"></i>
                                        Pinterest
                                    </a>
                                </div>
                            </div>
                        </div>




                        <div class=" p-t-50">

                        <h4 class="f1-l-4 cl3 p-b-12">
                               التعليقات
                            </h4>


                            @foreach($article->comments as $commetn)
                            <div class="size-w-11">
                                <h6 class="p-b-4">
                                <a href="" class="f1-s-5 cl3 hov-cl10 trans-03">
                                    {{$commetn->body}}
                                </a>
                            </h6>

                            <span class="cl8 txt-center p-b-24">
											<a href="#" class="f1-s-6 cl8 hov-cl10 trans-03">
												{{$commetn->user->name}}
											</a>

											<span class="f1-s-3 m-rl-3">
												-
											</span>

											<span class="f1-s-3">
												{{$commetn->created_at->diffforhumans()}}
											</span>


											<span class="f1-s-3 float-l">

                                                @if($commetn->user_id == auth()->id() || auth('admin')->check())
                                                <button title="حذف" id="delete" route="{{route('comment.delete')}}" model_id="{{$commetn->id}}" class=" float-l size-a-10 bg15 borad-3 f1-s-6 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                                              <i class="fa fa-trash"></i>
                                                </button>
                                                    @endif
											</span>

										</span>

                        </div>

                                <span class="f1-s-3 m-rl-3">
										<hr>

											</span>
                        @endforeach

                        </div>




                    @auth('web')
                        <!-- Leave a comment -->
                        <div>
                            <h4 class="f1-l-4 cl3 p-b-12">
                             اترك تعليقك
                            </h4>

                            <form id="form">

                                <textarea  id="comment" class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" name="comment" placeholder="تعليق ..."></textarea>

                                <button id="submit" class=" float-l size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                                   نشر التعليق
                                </button>

                                <input id="article_id" name="article_id" type="hidden" value="{{$article->id}}">

                            </form>

                        </div>
                        @else
                            تعليق على المقال؟
                            <a href="{{route('login')}}" id="" class="  hov-btn1 trans-03 p-rl-15 m-t-10">
                                 تسجيل الدخول </a>
                        @endauth
                    </div>
                </div>

                <div class="col-md-10 col-lg-4 p-b-100">

                    <div class="p-l-10 p-rl-0-sr991">
                        <!-- Banner -->
                        <div class="flex-c-s">
                            <a href="#">
                                <img class="max-w-full" src="{{asset(setting('banner'))}}" alt="IMG">
                            </a>
                        </div>
                    </div>


                    <div class="p-l-10 p-rl-0-sr991 p-t-30">
                        <div class="how2 how2-cl6 flex-s-c">
                            <h3 class="f1-m-2 cl18 tab01-title">
                                المقالات الاكثر قراءة
                            </h3>
                        </div>

                        <ul class="p-t-35">
                            @foreach(articles(null,null)->take(6) as $post)
                                <li class="flex-wr-sb-s p-b-22">
                                    <div class="size-a-8 flex-c-c borad-45 size-a-8 bg9 f1-m-4 cl0 m-b-6">
                                        <i class="fa fa-eye"></i>
                                    </div>

                                    <a href="{{route('post',$post->slug)}}" class="size-w-3 f1-s-7 cl3 hov-cl10 trans-03">
                                        {{str_limit($post->title,50)}}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="how2 how2-cl21 flex-s-c">
                        <a href="{{route('videos')}}">
                            <h3 class="f1-m-2 cl21 tab01-title">
                                مكتبة الفيديوهات
                            </h3>
                        </a>
                    </div>
                    <div class="flex-wr-sb-s p-t-20 p-b-15 how-bor2">
                        <div class="flex-c-s">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">

                                    @foreach(videos(null,null) as $key=>$v)

                                        <div class="carousel-item {{$key==0?'active':''}}">
                                            <img class="d-block w-100 wrap-pic-w hov1 "  src="{{asset($v->image)}}"
                                                 alt="First slide">

                                            <div class="p-tb-16 p-rl-25 bg3">
                                                <h5 class="p-b-5">
                                                    <a href="#" class="f1-m-3 cl0 hov-cl10 trans-03">

                                                        <button id="view" class="s-full ab-t-l flex-c-c fs-32 cl0 hov-cl10 trans-03"   data-toggle="modal" data-target="#modal-video-01" model_id="{{$v->id}}">
                                                            <span class="fab fa-youtube"></span><div></div>
                                                        </button>
                                                        {{str_limit($v->title,80)}}
                                                    </a>
                                                </h5>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>
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


    <script src="{{asset('dashboard/js/sweetalert2.all.js')}}"
            type="text/javascript"></script>

    <script src="{{asset('dashboard/js/jquery-validation/dist/jquery.validate.js')}}"
            type="text/javascript"></script>

    <script src="{{asset('dashboard/js/jquery-validation/dist/localization/messages_ar.js')}}"
            type="text/javascript"></script>


    <script>

         $(function() {
             $("#form").validate({
                 rules: {
                     comment: {
                         required: true,
                     },
                 },

                 submitHandler: function(form){
                     let comment = $('#comment').val();
                     let article_id = $('#article_id').val();

                     $.ajax({
                         data: {
                             "_token": "{{ csrf_token() }}",
                             comment:comment,
                             article_id:article_id,


                         },
                         url: "{{route('comment.store')}}",
                         type: "post",
                         dataType: "JSON",

                         success: function (data) {
                             swal("تم", data.message, "success");


                             setTimeout(function()
                             {
                                 window.location.reload();
                             }, 1000);
                         },


                         error: function (data) {
                             swal("خطأ!",'فشل ارسال الرسالة البيانات', "error");
                         },
                     });

                 }
             });

         });

     </script>




    <script>

        $(document).on("click",'#delete',function (e){
            e.preventDefault();
            var model_id = $(this).attr('model_id');
            var route = $(this).attr('route');

            swal({
                title: 'هل انت متأكد من الحذف ?',
                text: "بمجرد التأكيد سيتم الحذف نهائيا!",
                type: 'warning',
                confirmButtonText: 'نعم , احذف',
                confirmButtonColor: '#ef4343',
                showCancelButton: true,
                cancelButtonText: 'لا , الغاء',
                cancelButtonColor: '#343a40',
            }).then(function(result){
                if (result.value) {

                    $.ajax({

                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': model_id,
                        },
                        url: route,
                        type: "json",
                        method: "post",


                        success: function (data) {
                            swal(
                                'تم الحذف !',
                                data.message,
                                'success'

                            )

                            setTimeout(function()
                            {
                                window.location.reload();
                            }, 1000);

                        },
                    })

                } else if (result.dismiss === 'cancel') {
                    swal(
                        'تم الالغاء',
                        'لم يتم الحذف',
                        'error',

                    )
                }
            });
        });

    </script>







    @endpush


