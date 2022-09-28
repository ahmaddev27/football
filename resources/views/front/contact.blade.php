@extends('front.layouts.index',['title'=>'تواصل معنا'])
<!-- Post -->

@section('main')



    <section class="bg0 p-b-140 p-t-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">
                            <div class="container p-t-4 p-b-40  ">
                                <h2 class="f1-l-1 cl17 m-5 float-r">
                                   اتصل بنا
                                </h2>


                                    <div class="col-md-7 col-lg-8 p-b-80">
                                        <div class="p-r-10 p-r-0-sr991">
                                            <form id="form">
                                                <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20"  id="name" required type="text" name="name" placeholder="الاسم *">

                                                <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" id="email" required type="text" name="email" placeholder="البريد الكتروني *">

                                                <input class="bo-1-rad-3 bocl13 size-a-19 f1-s-13 cl5 plh6 p-rl-18 m-b-20" id="title" type="text" name="title" placeholder="الموضوع ">

                                                <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20" id="msg" required name="msg" placeholder="رسالتك"></textarea>

                                                <button class="size-a-20 bg19 borad-12 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-20 float-l">
                                                    ارسال
                                                </button>
                                            </form>
                                        </div>
                                    </div>


                        </div>

                    </div>
                </div>


            </div>
        </div>
        </div>
    </section>


@stop







@push('js')



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
                    name: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    msg: {
                        required: true,
                    },
                    email: {
                        required: true,email:true,
                    },
                },

                submitHandler: function(form){
                    let name = $('#name').val();
                    let title = $('#title').val();
                    let email = $('#email').val();
                    let msg = $('#msg').val();
                    $.ajax({
                        data: {
                            "_token": "{{ csrf_token() }}",
                            name:name,
                            title:title,
                            email:email,
                            msg:msg,

                        },
                        url: "{{route('contact.store')}}",
                        type: "post",
                        dataType: "JSON",

                        success: function (data) {
                            swal("تم", data.message, "success");

                            setTimeout(function()
                            {
                                window.location.href = "/";
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




@endpush
