@extends('dashboard.layouts.master',['title'=>'الاعدادات'])
@section('content')



    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 mb-3">
                <h4 class="mb-0"> اعدادات الموقع</h4>
            </div>

        </div>
    </div>
    <!-- widgets -->
    <div class="row">


        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">


                <form action="{{route('dashboard.post.store')}}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <div class="container text-center">
                        <div class="row">


                            <div class="col-xl-12 mb-30 mt-3">

                                <div class="card-body">

                                    @foreach($settings as $setting)
                                        @if($setting->type==0||$setting->type==1)
                                            <div class="form-group m-form__group row">
                                                <label class="col-lg-3 col-form-label">{{$setting->slug}} </label>
                                                <div class="col-lg-6">

                                                    @if($setting->type==0)
                                                        <input type="text" class="form-control m-input"
                                                               placeholder="Enter {{$setting->slug}}"
                                                               value="{{$setting->value}}" name="{{$setting->key}}">
                                                    @endif
                                                    @if($setting->type==1)
                                                        <textarea class="form-control"
                                                                  name="{{$setting->key}}" id="exampleTextarea"
                                                                  rows="3">{{$setting->value}}</textarea>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif

                                    @endforeach


                                    @foreach($settings as $setting)
                                            @if($setting->type==2)
                                                @if($setting->key=='icon')
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-lg-3 col-form-label">{{$setting->slug}} </label>
                                                        <div class="col-lg-6">
                                                            <div class="card-body">
                                                                <img src="{{asset($setting->value)}}"
                                                                     id="icon" class="img-fluid img-thumbnail">
                                                                <div class="custom-file mt-3">
                                                                    <input type="file" name="icon" accept="image/*" class="custom-file-input " onchange="readURL2(this);" id="icon" lang="ar">
                                                                    <label class="custom-file-label" for="customFileLang">اختر صورة الايقونة</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                @elseif($setting->key=='image')
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-lg-3 col-form-label">{{$setting->slug}} </label>
                                                        <div class="col-lg-6">
                                                            <div class="card-body">
                                                                <img src="{{asset($setting->value)}}"
                                                                    width="600" height="82"  id="image" class="img-fluid img-thumbnail">
                                                                <div class="custom-file mt-3">
                                                                    <input type="file" name="image" accept="image/*" class="custom-file-input " onchange="readURL(this);" id="image" lang="ar">
                                                                    <label class="custom-file-label" for="customFileLang">اختر صورة الموقع الرئيسية</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                @elseif($setting->key=='banner')
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-lg-3 col-form-label">{{$setting->slug}} </label>
                                                        <div class="col-lg-6">
                                                            <div class="card-body">
                                                                <img src="{{asset($setting->value)}}" width="300" height="600"
                                                                     id="banner" class="img-fluid img-thumbnail">
                                                                <div class="custom-file mt-3">
                                                                    <input type="file" name="banner" accept="image/*" class="custom-file-input " onchange="readURL3(this);" id="banner" lang="ar">
                                                                    <label class="custom-file-label" for="customFileLang">اختر صورة البنر الاول</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                @elseif($setting->key=='banner_two')
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-lg-3 col-form-label">{{$setting->slug}} </label>
                                                        <div class="col-lg-6">
                                                            <div class="card-body">
                                                                <img src="{{asset($setting->value)}}" width="600" height="82"
                                                                     id="banner_two" class="img-fluid img-thumbnail">
                                                                <div class="custom-file mt-3">
                                                                    <input type="file" name="banner_two" accept="image/*" class="custom-file-input " onchange="readURL4(this);" id="banner_two" lang="ar">
                                                                    <label class="custom-file-label" for="customFileLang">اختر صورة البنر الثاني</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @elseif($setting->key=='banner_three')
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-lg-3 col-form-label">{{$setting->slug}} </label>
                                                        <div class="col-lg-6">
                                                            <div class="card-body">
                                                                <img src="{{asset($setting->value)}}" width="300" height="600"
                                                                     id="banner_three" class="img-fluid img-thumbnail">
                                                                <div class="custom-file mt-3">
                                                                    <input type="file" name="banner_three" accept="image/*" class="custom-file-input " onchange="readURL5(this);" id="banner_three" lang="ar">
                                                                    <label class="custom-file-label" for="customFileLang">اختر صورة البنر الثالث</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                @endif

                                            @endif
                                    @endforeach


                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" id="save" class="button ">حفظ</button>
                        </div>

                    </div>


                </form>


            </div>
        </div>
    </div>





    <!--=================================
     wrapper -->

    <!--=================================
     footer -->

    @push('js')
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image')
                            .attr('src', e.target.result)
                            .width(600)
                            .height(82);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script type="text/javascript">
            function readURL2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#icon')
                            .attr('src', e.target.result)
                            .width(52)
                            .height(60);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script type="text/javascript">
            function readURL3(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#banner')
                            .attr('src', e.target.result)
                            .width(300)
                            .height(600);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script type="text/javascript">
            function readURL4(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#banner_two')
                            .attr('src', e.target.result)
                            .width(660)
                            .height(82);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

  <script type="text/javascript">
            function readURL5(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#banner_three')
                            .attr('src', e.target.result)
                            .width(300)
                            .height(600);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>



        <script>
            $(document).on("click", "#save", function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });
                $.ajax({
                    processData: false,
                    contentType: false,
                    url: "{{ route('dashboard.settings.store') }}",
                    data: new FormData($("#form")[0]),
                    dataType: 'json',
                    type: 'POST',

                    success: function (data) {
                        swal("تمت العملية", data.message, data.icon);
                        setTimeout(function()
                        {
                            location.reload();
                        }, 1000);

                    },

                    error: function (data) {
                        swal("Error!", 'Failed to save data', "error");
                    },
                })

            });
        </script>

    @endpush
@stop
