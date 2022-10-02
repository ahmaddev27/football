@extends('dashboard.layouts.master',['title'=>'الرد على الرسالة'])
@section('content')




    <div class="page-title">

    </div>
    <!-- widgets -->
    <div class="row">



        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">


                    <div class="mail-body">
                        <div class="mb-4 d-block">
                            <h4 class="d-inline-block">{{$inbox->title}} </h4>
                            @if($inbox->is_replay==1)
                            <span class="badge badge-pill badge-secondary ml-3"> تم الرد مسبقا </span>
                            @else
                                <span class="badge badge-pill badge-success ml-3"> رسالة جديدة </span>

                            @endif

                        </div>
                        <div class="media px-2">
                            <div class="position-relative">
                                <img class="img-fluid mr-15 avatar-small" src="{{asset('dashboard/images/team/02.jpg')}}" alt="">
                            </div>
                            <div class="media-body">
                                <h6 class="mt-0 d-inline-block">{{$inbox->name}},
                                </h6> <a class="pl-2 text-muted" href="#">{{$inbox->email}}

                                </a>


                            </div>
                        </div>
                        <div class="divider m-3"></div>



                        <div class="mt-4">
                             <p class="text-center">
                            {{$inbox->msg}}
                             </p>

                            <div class="divider m-5"></div>

                            <form class="m-form m-form--fit m-form--label-align-right" id="form" onsubmit="event.preventDefault();">
                                @csrf
                            <div class="col-12 mt-3">
                                <textarea id="summernote"   name="text"></textarea>
                            </div>
                                <input type="hidden" id="id" name="id" value="{{$inbox->id}}">
                            </form>

                            <div class="modal-footer">
                                <button type="submit" id="submit" class="button ">ارسال</button>
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


        <script>
            $('#summernote').summernote({
                height: 150,                 // set editor height
                focus: true,
                placeholder: 'ادخل ردك على الرسالة',
            });
        </script>


        <script>

            $(document).on("click", "#submit", function (e) {
                e.preventDefault();

                document.getElementById("submit").disabled = true;


                let text = $('#summernote').val();
                let id = $('#id').val();
                $.ajax({
                    data: {
                        "_token": "{{ csrf_token() }}",
                        text:text,
                        id:id,
                    },


                    url: "{{url('/dashboard/inbox/send')}}" + '/' + id,
                    type: "post",
                    dataType: "JSON",

                    success: function (data) {
                        swal("Successfully", data.message, "success");
                        $("#form")[0].reset();
                        document.getElementById("submit").disabled = false;

                    },

                    error: function (data) {

                        $("#form")[0].reset();
                        document.getElementById("submit").disabled = false;
                        swal("خطأ !",'لم يتم ارسال الرسالة', "error");
                    },

                });

            });

        </script>

    @endpush
@stop
